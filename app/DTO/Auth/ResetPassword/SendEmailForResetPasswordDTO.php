<?php

namespace App\DTO\Auth\ResetPassword;

use Spatie\DataTransferObject\DataTransferObject;

class SendEmailForResetPasswordDTO extends DataTransferObject
{
    public string $email;
}
