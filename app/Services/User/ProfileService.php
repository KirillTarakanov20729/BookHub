<?php

namespace App\Services\User;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    private Authenticatable $user;
    public function get_user(): Authenticatable
    {
        return $this->user = Auth::user();
    }

    public function get_active_book(): Book|null
    {
        return Book::query()->where('id', $this->user->active_book_id)->first();
    }

    public function get_total_read_books(): int
    {
        return Book::query()->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
    }

    public function get_favorite_genres(): Collection
    {
        $read_books = Book::query()->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        $genre_counts = $read_books->flatMap(function ($book) {
            return $book->genres->pluck('id');
        })->countBy();

        $max_count = $genre_counts->max();

        $favorite_genres = $genre_counts->filter(function ($count) use ($max_count) {
            return $count === $max_count;
        });

        return Genre::query()->whereIn('id', $favorite_genres->keys())->get();
    }

    public function get_favorite_authors(): Collection
    {
        $read_books = Book::query()->whereHas('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        $author_counts = $read_books->flatMap(function ($book) {
            return $book->authors->pluck('id');
        })->countBy();

        $max_count = $author_counts->max();

        $favorite_authors = $author_counts->filter(function ($count) use ($max_count) {
            return $count === $max_count;
        });

        return $favorite_authors->keys()->map(function ($id) {
            return Author::query()->where('id', $id)->first();
        });
    }
}
