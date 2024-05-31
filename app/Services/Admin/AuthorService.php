<?php

namespace App\Services\Admin;

use App\DTO\Admin\Author\SearchAuthorDTO;
use App\DTO\Admin\Author\StoreAuthorDTO;
use App\DTO\Admin\Author\UpdateAuthorDTO;
use App\Http\Filters\AuthorFilter;
use App\Http\Filters\UserFilter;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthorService
{
    public function get_authors(SearchAuthorDTO $data): LengthAwarePaginator
    {
        $filter = app()->make(AuthorFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return Author::filter($filter)->paginate(20)->withQueryString();
    }

    public function get_author(int $id): Author
    {
        return Cache::remember('author_'.$id, 3600, function () use ($id) {
            return Author::query()->findOrFail($id);
        });
    }

    public function store_author(StoreAuthorDTO $data): bool
    {
        try {
            $author       = new Author;

            $this->save_author_info($author, $data);

            Cache::put('author_'. $author->id, $author, 3600);
            Cache::forget('authors');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_author(UpdateAuthorDTO $data): bool
    {
        try {
            $author       = Author::query()->findOrFail($data->id);

            $this->save_author_info($author, $data);

            Cache::put('author_'. $author->id, $author, 3600);
            Cache::forget('authors');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_author(int $id): bool
    {
        try {
            $author = Author::query()->findOrFail($id);

            Cache::forget('author_'.$id);
            Cache::forget('authors');

            return $author->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function save_author_info(Author $author, StoreAuthorDTO|UpdateAuthorDTO $data): void
    {
        $author->first_name = $data->first_name;
        $author->last_name = $data->last_name;

        if (isset($data->middle_name)) {
            $author->middle_name = $data->middle_name;

            $author->full_name = $data->last_name . ' ' . $data->first_name . ' ' . $data->middle_name;
        }
        else {
            $author->full_name = $data->last_name . ' ' . $data->first_name;
        }

        $author->save();

    }
}
