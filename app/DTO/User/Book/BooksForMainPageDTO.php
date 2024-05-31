<?php

namespace App\DTO\User\Book;

use Illuminate\Database\Eloquent\Collection;
use Spatie\DataTransferObject\DataTransferObject;

class BooksForMainPageDTO extends DataTransferObject
{
    public? Collection $newest_books;

    public? Collection $fantasy_books;

    public? Collection $dostoevsky_books;
}
