<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Validação de token reCAPTCHA v3 com verificação de SCORE.
 *
 * Diferente da regra 'captcha' (anhskohbo/no-captcha), que apenas confirma
 * que o token é válido, esta regra também exige que o score retornado pelo
 * Google seja >= ao limiar configurado (NOCAPTCHA_SCORE, padrão 0.5).
 *
 * Compatível com PHP 7.2 / Laravel 6: usa file_get_contents (sem Guzzle/Http
 * facade). Mantém o mesmo segredo global NOCAPTCHA_SECRET já usado pelo projeto.
 *
 * Uso (substitui 'captcha' na rule):
 *   'g-recaptcha-response' => ['required', new RecaptchaV3Rule('contact')],
 */
class RecaptchaV3Rule implements Rule
{
    /**
     * Endpoint oficial de verificação do Google.
     */
    const VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

    /**
     * Ação esperada (definida no front em grecaptcha.execute(key, {action})).
     * Se null, a checagem de ação é ignorada.
     *
     * @var string|null
     */
    private $expectedAction;

    /**
     * Mensagem de erro acumulada (varia conforme o motivo da falha).
     *
     * @var string
     */
    private $errorMessage = 'A verificação anti-spam falhou. Recarregue a página e tente novamente.';

    /**
     * @param string|null $expectedAction
     */
    public function __construct($expectedAction = null)
    {
        $this->expectedAction = $expectedAction;
    }

    /**
     * Determina se a regra de validação é aprovada.
     *
     * @param string $attribute
     * @param mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (empty($value)) {
            return false;
        }

        $secret = config('captcha.secret', env('NOCAPTCHA_SECRET'));
        if (empty($secret)) {
            // Sem segredo configurado: não é possível validar. Bloqueia por segurança.
            $this->errorMessage = 'reCAPTCHA não configurado no servidor.';
            return false;
        }

        $response = $this->verify($secret, $value);

        if ($response === null) {
            // Falha de rede ao contatar o Google.
            $this->errorMessage = 'Não foi possível verificar o reCAPTCHA. Tente novamente.';
            return false;
        }

        if (empty($response['success'])) {
            return false;
        }

        // Confere a ação, se informada (defesa extra contra reuso de token).
        if ($this->expectedAction !== null
            && isset($response['action'])
            && $response['action'] !== $this->expectedAction) {
            return false;
        }

        // Score do v3 (0.0 a 1.0). Limiar configurável via NOCAPTCHA_SCORE.
        $threshold = (float) env('NOCAPTCHA_SCORE', 0.5);
        $score     = isset($response['score']) ? (float) $response['score'] : 0.0;

        return $score >= $threshold;
    }

    /**
     * Chama o siteverify do Google. Retorna o array decodificado ou null em erro.
     *
     * @param string $secret
     * @param string $token
     * @return array|null
     */
    private function verify($secret, $token)
    {
        $postData = http_build_query([
            'secret'   => $secret,
            'response' => $token,
            'remoteip' => request()->ip(),
        ]);

        $context = stream_context_create([
            'http' => [
                'method'        => 'POST',
                'header'        => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content'       => $postData,
                'timeout'       => 5,
                'ignore_errors' => true,
            ],
        ]);

        $raw = @file_get_contents(self::VERIFY_URL, false, $context);
        if ($raw === false) {
            return null;
        }

        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : null;
    }

    /**
     * Mensagem de erro de validação.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
