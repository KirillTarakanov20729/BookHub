<?php

namespace App\DTO\User\Book;

use Spatie\DataTransferObject\DataTransferObject;

class UserSearchBookDTO extends DataTransferObject
{
    public ?string $name;
    public ?int $author_id;
    public ?int $genre_id;
    public ?int $age_limit_id;
    public ?int $availability;
}
