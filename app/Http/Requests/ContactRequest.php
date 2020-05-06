<?php

namespace App\Http\Requests;

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
            'name'                 => ['required', 'min:3', 'max:191'],
            'email'                => ['required', 'max:191', 'email'],
            'message'              => ['required', 'min:10', 'max:1500'],
            'g-recaptcha-response' => ['required', 'captcha']
        ];
    }
}
