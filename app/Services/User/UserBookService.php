<?php

namespace App\Services\User;

use App\DTO\User\Book\BooksForMainPageDTO;
use App\Http\Filters\BookFilter;
use App\Models\Book;
use App\Services\Includes\BookService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserBookService extends BookService
{

    public function get_pdf_file(Book $book): bool|string
    {
        if (Storage::exists($book->text_path)) {

            $fileContent = Storage::get($book->text_path);

            Auth::user()->active_book_id = $book->id;
            Cache::put('active_book_from_user_' . Auth::id(), $book, 3600);
            Auth::user()->save();

            return $fileContent;
        } else {
            return false;
        }
    }

    public function set_book_was_read(Book $book): void
    {
        Cache::forget('total_read_books_from_user_' . Auth::id());

        Cache::forget('read_books_from_user_' . Auth::id());

        Cache::forget('book_' . $book->id);

        $book->users()->toggle(Auth::id());
    }

    public function get_name_author(Book $book): Collection
    {
        $authors = $book->authors->collect();

        $authors->each(function ($author) {

            $first_name = mb_substr($author->first_name, 0, 1);

            if (mb_strlen($author->middle_name) > 0) {
                $middle_name = mb_substr($author->middle_name, 0, 1);
                $author->full_name = $first_name . '. ' . $middle_name . '. ' . $author->last_name;
            }
            else {
                $author->full_name = $first_name . '. ' . $author->last_name;
            }
        });

        return $authors;
    }


}
