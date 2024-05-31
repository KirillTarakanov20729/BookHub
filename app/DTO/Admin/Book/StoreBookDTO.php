<?php

namespace App\DTO\Admin\Book;


use Spatie\DataTransferObject\DataTransferObject;

class StoreBookDTO extends DataTransferObject
{
    public string $name;
    public string $short_description;
    public string $full_description;
    public int $release_date;
    public $image;
    public $text;
    public int $subscription_type_id;
    public array $publishers_id;
    public array $authors_id;
    public array $genres_id;
    public int $age_limit_id;
}
