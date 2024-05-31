<?php

namespace App\DTO\Admin;

use Spatie\DataTransferObject\DataTransferObject;

abstract class SearchEntityDTO extends DataTransferObject
{
    public ?string $name;
}
