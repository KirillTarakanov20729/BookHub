<?php

namespace App\Services\User;

use App\Models\Book;
use App\Services\Includes\BookService;
use Illuminate\Support\Facades\Storage;

class UserBookService extends BookService
{
    public function get_books_for_main_page(): array
    {
        $data['newest_books'] = Book::query()->orderBy('created_at', 'desc')->take(3)->get();

        $data['fantasy_books'] = Book::query()->whereHas('genres', function ($query) {
            $query->where('genre_id', 2);
        })->take(3)->get();

        $data['dostoevsky_books'] = Book::query()->whereHas('authors', function ($query) {
            $query->where('author_id', 7);
        })->take(3)->get();

        return $data;
    }


}
