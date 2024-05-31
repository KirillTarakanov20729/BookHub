<?php

namespace App\DTO\Admin\Author;

use Spatie\DataTransferObject\DataTransferObject;

class StoreAuthorDTO extends DataTransferObject
{
    public string $first_name;

    public string $last_name;

    public string $middle_name;

}
