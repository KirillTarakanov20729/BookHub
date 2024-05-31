<?php

namespace App\DTO\Admin\User;

use App\DTO\Admin\SearchEntityDTO;

class SearchUserDTO extends SearchEntityDTO
{
    public? int $subscription_type_id;

    public? int $page;
}
