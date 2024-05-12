<?php

namespace App\Services\Includes;

use App\DTO\Admin\Book\SearchBookDTO;
use App\Models\AgeLimit;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\SubscriptionType;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class BookService
{
    public function get_books(SearchBookDTO $data): LengthAwarePaginator
    {
        $bookQuery = Book::query();

        if (isset($data->name)) {
            $bookQuery->where('name', 'like', '%' . $data->name . '%');
        }

        if (isset($data->author_id) && $data->author_id > 0) {
            $bookQuery->whereHas('authors', function ($query) use ($data) {
                $query->where('author_id', $data->author_id);
            });
        }

        if (isset($data->genre_id) && $data->genre_id > 0) {
            $bookQuery->whereHas('genres', function ($query) use ($data) {
                $query->where('genre_id', $data->genre_id);
            });
        }

        if (isset($data->publisher_id) && $data->publisher_id > 0) {
            $bookQuery->whereHas('publishers', function ($query) use ($data) {
                $query->where('publisher_id', $data->publisher_id);
            });
        }

        if (isset($data->age_limit_id) && $data->age_limit_id > 0) {
            $bookQuery->where('age_limit_id', $data->age_limit_id);
        }

        return $bookQuery->paginate(21);
    }

    public function get_data(): array
    {
        $data['genres'] = Genre::all();
        $data['authors'] = Author::all();
        $data['publishers'] = Publisher::all();
        $data['subscription_types'] = SubscriptionType::all();
        $data['age_limits'] = AgeLimit::all();

        return $data;
    }

    public function get_book(int $id): Book
    {
        return Book::query()->findOrFail($id);
    }

    public function get_user(): Authenticatable
    {
        return Auth::user();
    }


}
