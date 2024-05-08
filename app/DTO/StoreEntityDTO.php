<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

abstract class StoreEntityDTO extends DataTransferObject
{
    public string $name;
}
