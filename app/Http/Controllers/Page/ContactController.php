<?php

namespace App\Http\Controllers\Page;

use App\Helpers\NotifyHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\About\Information\Description;
use App\Models\About\Information\Social;
use App\Notifications\Contact;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Notifiable;
use Illuminate\View\View;

class ContactController extends Controller
{
    use Notifiable;

    /**
     * E-mail para notificar.
     *
     * @var string
     */
    private $email;

    /**
     * Display the specified resource.
     *
     * @return Factory|RedirectResponse|View
     */
    public function show()
    {
        $this->permissionBlock();

        $site = Description::getDescription();

        if ($site['email']) {
            $socials = Social::getSocial();

            return view('pages.contact.page', compact('site', 'socials'));
        }

        return back()->with('notify', json_encode(NotifyHelpers::info_top_center('fas fa-exclamation-triangle', 'Sistema sem e-mail cadastrado.')));
    }

    /**
     * Enviar e-mail para o recurso especificado.
     *
     * @param ContactRequest $request
     * @return JsonResponse
     */
    public function email(ContactRequest $request)
    {
        try {
            // enviar notificação por e-mail
            $this->email = Description::getDescription()['email'];
            $this->notify(new Contact($request));

            $data = NotifyHelpers::success_top_center('fas fa-envelope', 'Mensagem enviado com sucesso.');
        } catch (Exception $e) {
            $data = NotifyHelpers::warning_top_center('fas fa-exclamation-triangle', 'O envio da mensagem falhou.<br><br><small><b>erro: </b>' . $e->getMessage() . '</small>');
        }

        return response()->json($data);
    }
}
