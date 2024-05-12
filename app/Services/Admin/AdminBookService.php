<?php

namespace App\Services\Admin;

use App\DTO\Admin\Book\StoreBookDTO;
use App\DTO\Admin\Book\UpdateBookDTO;
use App\Models\Book;
use App\Services\Includes\BookService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ZipArchive;


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
