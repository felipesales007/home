<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Contact extends Notification
{
    use Queueable;

    private $message;

    /**
     * Construtor.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Receba os canais de entrega da notificação.
     *
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * Obtenha a representação de correio da notificação.
     *
     * @return MailMessage
     */
    public function toMail()
    {
        $mailMessage = new MailMessage();

        $mailMessage->subject('Notificação de contato');
        $mailMessage->greeting('Olá,');
        $mailMessage->line('Sou <b>' . $this->message->name . '</b> e venho através deste contato informar a mensagem abaixo:');

        $mailMessage->line($this->message->message . '<br><br>');

        if ($this->message->house) {
            $mailMessage->line('<b>Imóvel: </b>' . $this->message->house);
            $mailMessage->line('<b>Link: </b><a href="' . $this->message->link . '">' . $this->message->link . '</a><br><br>');
        }

        if ($this->message->phone) {
            $mailMessage->line('<b>Telefone: </b>' . $this->message->phone);
        }

        $mailMessage->line('<b>E-mail para resposta: </b><a href="mailto:' . $this->message->email . '">' . $this->message->email . '</a>');
        $mailMessage->action('Acessar site', route('home.page'));

        return $mailMessage;
    }
}
