<?php

namespace App\Http\Requests;

use App\Rules\RecaptchaV3Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer essa solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'house'                => ['nullable', 'min:3', 'max:191'],
            'link'                 => ['nullable', 'min:3', 'max:191', 'url'],
            'name'                 => ['required', 'min:3', 'max:191'],
            'email'                => ['required', 'max:191', 'email'],
            'phone'                => ['nullable', 'min:14', 'max:15', 'phones'],
            'message'              => ['required', 'min:10', 'max:1500'],
            'g-recaptcha-response' => ['required', new RecaptchaV3Rule('contact')]
        ];
    }
}
