<?php

namespace App\Services\Includes;

use App\DTO\Admin\Book\AdminSearchBookDTO;
use App\DTO\Admin\Book\CreateDataForBookDTO;
use App\DTO\User\Book\BooksForMainPageDTO;
use App\DTO\User\Book\UserSearchBookDTO;
use App\Http\Filters\BookFilter;
use App\Models\AgeLimit;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\SubscriptionType;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BookService
{
    public function get_books(UserSearchBookDTO|AdminSearchBookDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return Book::with(['authors', 'genres', 'publishers', 'age_limit', 'subscription_type'])->filter($filter)->paginate(21)->withQueryString();
    }

    public function get_books_for_main_page(): BooksForMainPageDTO
    {
        return Cache::remember('books_for_main_page', 60 * 60 * 12, function () {
            $data               = new BooksForMainPageDTO();

            $data->newest_books = $this->getFilteredBooks(['newest' => true])->take(3)->get();

            $data->fantasy_books = $this->getFilteredBooks(['genre_id' => 2])->take(3)->get();

            $data->dostoevsky_books = $this->getFilteredBooks(['author_id' => 6])->take(3)->get();

            return $data;
        });
    }

    public function get_data(): CreateDataForBookDTO
    {
        $genres = Cache::remember('genres', 60 * 60 * 12, function () {
            return Genre::query()->orderBy('name')->get();
        });

        $authors = Cache::remember('authors', 60 * 60 * 12, function () {
            return Author::query()->orderBy('full_name')->get();
        });

        $publishers = Cache::remember('publishers', 60 * 60 * 12, function () {
            return Publisher::query()->orderBy('name')->get();
        });

        $subscription_types = Cache::remember('subscription_types', 60 * 60 * 12, function () {
            return SubscriptionType::query()->with('features')->get();
        });

        $age_limits = Cache::remember('age_limits', 60 * 60 * 12, function () {
            return AgeLimit::query()->get();
        });

        return new CreateDataForBookDTO([
            'genres' => $genres,
            'authors' => $authors,
            'publishers' => $publishers,
            'subscription_types' => $subscription_types,
            'age_limits' => $age_limits]);
    }

    public function get_book(int $id): Book
    {
        return Cache::remember('book_' . $id, 60 * 60 * 12, function () use ($id) {
            return Book::query()->with('authors', 'genres', 'publishers', 'age_limit', 'subscription_type', 'users')->where('id', $id)->firstOrFail();
        });
    }

    public function get_user(): Authenticatable
    {
        return Cache::remember('user_' . Auth::id(), 60 * 60 * 12, function () {
            return User::query()->where('id', Auth::id())->with('subscription')->firstOrFail();
        });
    }

    private function getFilteredBooks(array $filters): Builder
    {
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($filters)]);

        return Book::filter($filter);
    }

}
