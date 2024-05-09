<?php

namespace App\Services\User;

use App\Models\Book;
use App\Services\Includes\BookService;
use Illuminate\Support\Facades\Auth;
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

    public function get_pdf_file(Book $book)
    {
        if (Storage::exists($book->text_path)) {
            $fileContent = Storage::get($book->text_path);

            Auth::user()->active_book_id = $book->id;
            Auth::user()->save();

            return $fileContent;
        } else {
            return false;
        }
    }

    public function set_book_was_read(Book $book)
    {
        $book->users()->toggle(Auth::id());
    }

}
