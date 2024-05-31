<?php

namespace App\DTO\Auth;

use Spatie\DataTransferObject\DataTransferObject;

class ChangePasswordDTO extends DataTransferObject
{
    public string $current_password;

    public string $new_password;
}
