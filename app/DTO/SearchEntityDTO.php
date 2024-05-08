<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

abstract class SearchEntityDTO extends DataTransferObject
{
    public ?string $name;
}
