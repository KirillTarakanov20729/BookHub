<?php

namespace App\Notifications\Password;

use App\Models\ResetPasswordRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private ResetPasswordRequest $resetPasswordRequest;

    public function __construct(ResetPasswordRequest $resetPasswordRequest)
    {
        $this->resetPasswordRequest = $resetPasswordRequest;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = config('app.url') . '/reset-password/' . $this->resetPasswordRequest->token;

        return (new MailMessage)
            ->subject('Смена пароля')
            ->greeting('Здравствуйте!')
            ->line('Вы отправили заявку на смену пароля. Пожалуйста, перейдите по ссылке ниже: ')
            ->action('Изменить пароль', url($url))
            ->line('Если вы не отправляли заявку на смену пароля, проигнорируйте это письмо.');
    }

}
