<?php

namespace App\Services\Admin;

use App\DTO\Admin\Book\StoreBookDTO;
use App\DTO\Admin\Book\UpdateBookDTO;
use App\Models\Book;
use App\Services\Includes\BookService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class AdminBookService extends BookService
{
    public function store_book(StoreBookDTO $data): bool
    {
        try {
            $book       = new Book;
            $this->save_book_info($data, $book);

            $image_path = Storage::disk('public')->put('books/images', $data->image);
            $book->image_path = $image_path;

            $text_path = Storage::disk('public')->putFile('books/text', $data->text);
            $book->text_path = $text_path;

            if ($book->save()) {
                $book->authors()->sync($data->authors_id);
                $book->genres()->sync($data->genres_id);
                $book->publishers()->sync($data->publishers_id);

                Cache::forget('books_for_main_page');
                Cache::put('book_'. $book->id, $book->load('authors', 'genres', 'publishers', 'users', 'age_limit'), 3600);
                Cache::put('authors_from_book_' . $book->id, $book->authors->pluck('id'), 3600);
                Cache::put('genres_from_book_' . $book->id, $book->genres->pluck('id'), 3600);
            }

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_book(UpdateBookDTO $data): bool
    {
        try {
            $book = Book::query()->findOrFail($data->id);
            $this->save_book_info($data, $book);

            if (isset($data->image)) {
                Storage::delete($book->image_path);
                $image_path = Storage::disk('public')->put('books/images', $data->image);
                $book->image_path = $image_path;
            }

            if (isset($data->text)) {
                Storage::delete($book->text_path);
                $text_path       = Storage::disk('public')->put('books/text', $data->text);
                $book->text_path = $text_path;
            }

            if ($book->save()) {
                $book->authors()->sync($data->authors_id);
                $book->genres()->sync($data->genres_id);
                $book->publishers()->sync($data->publishers_id);

                $books = $this->get_books_for_main_page();

                foreach ($books->newest_books->merge($books->fantasy_books)->merge($books->dostoevsky_books) as $main_book) {
                    if ($main_book->getKey() == $book->getKey()) {
                        Cache::forget('books_for_main_page');
                    }
                }

                Cache::put('book_'. $data->id, $book->load('authors', 'genres', 'publishers', 'users', 'age_limit'), 3600);
                Cache::put('authors_from_book_' . $book->id, $book->authors->pluck('id'), 3600);
                Cache::put('genres_from_book_' . $book->id, $book->genres->pluck('id'), 3600);
            }

           return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_book(int $id): bool
    {
        try {
            $book = Book::query()->findOrFail($id);

            $book->genres()->detach();
            $book->authors()->detach();
            $book->publishers()->detach();

            $books = $this->get_books_for_main_page();

            foreach ($books->newest_books->merge($books->fantasy_books)->merge($books->dostoevsky_books) as $main_book) {
                if ($main_book->getKey() == $id) {
                    Cache::forget('books_for_main_page');
                }
            }

            Cache::forget('book_'.$id);
            Cache::forget('authors_from_book_' . $book->id);
            Cache::forget('genres_from_book_' . $book->id);

            Storage::delete($book->image_path);
            Storage::delete($book->text_path);
            return $book->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }


    public function save_book_info(StoreBookDTO|UpdateBookDTO $data, Book $book): void
    {
        $book->name                 = $data->name;
        $book->short_description    = $data->short_description;
        $book->full_description     = $data->full_description;
        $book->release_date         = $data->release_date;
        $book->subscription_type_id = $data->subscription_type_id;
        $book->age_limit_id         = $data->age_limit_id;
    }

}
