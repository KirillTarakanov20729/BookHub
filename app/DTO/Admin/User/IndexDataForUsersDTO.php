<?php

namespace App\DTO\Admin\User;

use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class IndexDataForUsersDTO extends DataTransferObject
{
    public Collection $subscription_types;
}
