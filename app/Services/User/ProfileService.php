<?php

namespace App\Services\User;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ProfileService
{
    private User $user;
    public function get_user(): User
    {
        return Cache::remember('user_' . Auth::id(), 3600, function () {
            return $this->user = User::query()->where('id', Auth::id())->with('subscription')->firstOrFail();
        });
    }

    public function get_active_book(): Book|null
    {
        $this->user = $this->get_user();
        if ($this->user->active_book_id === null) {
            return null;
        }
        else {
            return Cache::remember('active_book_from_user_' . Auth::id(), 3600, function () {
                return Book::query()->where('id', $this->user->active_book_id)->first();
            });
        }
    }

    public function get_total_read_books(): int
    {
        return Cache::remember('total_read_books_from_user_' . Auth::id(), 3600, function () {
            return Book::query()->whereHas('users', function ($query) {
                $query->where('user_id', Auth::id());
            })->count();
        });
    }

    public function get_favorite_genres(): Collection
    {
        $read_books = Cache::remember('read_books_from_user_' . Auth::id(), 3600, function () {
            return Book::query()->whereHas('users', function ($query) {
                $query
                    ->where('user_id', Auth::id())
                    ->with('authors', 'genres');
            })->get();
        });

        $genre_counts = $read_books->flatMap(function ($book) {
            return Cache::remember('genres_from_book_' . $book->id, 3600, function () use ($book) {
                return $book->genres->pluck('id');
            });
        })->countBy();

        $max_count = $genre_counts->max();

        $favorite_genres = $genre_counts->filter(function ($count) use ($max_count) {
            return $count === $max_count;
        });

        return Genre::query()->whereIn('id', $favorite_genres->keys())->take(1)->get();
    }

    public function get_favorite_authors(): Collection
    {
        $read_books = Cache::remember('read_books_from_user_' . Auth::id(), 3600, function () {
            return Book::query()->whereHas('users', function ($query) {
                $query
                    ->where('user_id', Auth::id())
                    ->with('authors', 'genres');
            })->get();
        });

        $authors_counts = $read_books->flatMap(function ($book) {
            return Cache::remember('authors_from_book_' . $book->id, 3600, function () use ($book) {
                return $book->authors->pluck('id');
            });
        })->countBy();

        $max_count = $authors_counts->max();

        $favorite_authors = $authors_counts->filter(function ($count) use ($max_count) {
            return $count === $max_count;
        });

        return Author::query()->whereIn('id', $favorite_authors->keys())->take(1)->get();
    }
}
