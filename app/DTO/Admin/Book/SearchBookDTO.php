<?php

namespace App\DTO\Admin\Book;

use Spatie\DataTransferObject\DataTransferObject;

class SearchBookDTO extends DataTransferObject
{
    public ?string $name;
    public ?int $author_id;
    public ?int $publisher_id;
    public ?int $genre_id;
    public ?int $age_limit_id;
    public ?int $subscription_type_id;
}
