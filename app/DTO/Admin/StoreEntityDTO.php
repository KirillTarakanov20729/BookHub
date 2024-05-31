<?php

namespace App\DTO\Admin;

use Spatie\DataTransferObject\DataTransferObject;

abstract class StoreEntityDTO extends DataTransferObject
{
    public string $name;
}
