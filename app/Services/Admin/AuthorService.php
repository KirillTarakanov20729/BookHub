<?php

namespace App\Services\Admin;

use App\DTO\Admin\Author\SearchAuthorDTO;
use App\DTO\Admin\Author\StoreAuthorDTO;
use App\DTO\Admin\Author\UpdateAuthorDTO;
use App\Models\Author;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class AuthorService
{
    public function get_authors(SearchAuthorDTO $data): LengthAwarePaginator
    {
        $author = Author::query();

        if (isset($data->name)) {
            $author->where('name', 'like', '%' . $data->name . '%');
        }

        return $author->paginate(20);
    }

    public function get_author(int $id): Author
    {
        return Author::query()->findOrFail($id);
    }

    public function store_author(StoreAuthorDTO $data): bool
    {
        try {
            $author       = new Author;
            $author->name = $data->name;
            return $author->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_author(UpdateAuthorDTO $data): bool
    {
        try {
            $author       = Author::query()->findOrFail($data->id);
            $author->name = $data->name;
            return $author->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_author(int $id): bool
    {
        try {
            $author = Author::query()->findOrFail($id);
            return $author->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
