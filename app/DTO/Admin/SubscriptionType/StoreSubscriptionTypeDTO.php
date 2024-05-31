<?php

namespace App\DTO\Admin\SubscriptionType;

use App\DTO\Admin\StoreEntityDTO;

class StoreSubscriptionTypeDTO extends StoreEntityDTO
{
    public int $price;
    public array $features_id;
}
