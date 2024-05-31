<?php

namespace App\DTO\Admin;

use Spatie\DataTransferObject\DataTransferObject;

abstract class UpdateEntityDTO extends DataTransferObject
{
    public int $id;
    public string $name;
}
