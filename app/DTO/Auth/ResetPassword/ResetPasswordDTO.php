<?php

namespace App\DTO\Auth\ResetPassword;

use App\Models\ResetPasswordRequest;
use Spatie\DataTransferObject\DataTransferObject;

class ResetPasswordDTO extends DataTransferObject
{
    public ResetPasswordRequest $request;
    public string $new_password;
}
