<?php

namespace App\DTO\Admin\SubscriptionType;

use App\DTO\Admin\UpdateEntityDTO;

class UpdateSubscriptionTypeDTO extends UpdateEntityDTO
{
    public int $price;
    public array $features_id;
}
