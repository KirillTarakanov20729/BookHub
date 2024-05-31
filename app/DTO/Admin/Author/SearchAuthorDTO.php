<?php

namespace App\DTO\Admin\Author;

use Spatie\DataTransferObject\DataTransferObject;

class SearchAuthorDTO extends DataTransferObject
{
    public? string $full_name;

    public? int $page;
}
