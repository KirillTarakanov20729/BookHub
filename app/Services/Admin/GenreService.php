<?php

namespace App\Services\Admin;

use App\DTO\Admin\Genre\SearchGenreDTO;
use App\DTO\Admin\Genre\StoreGenreDTO;
use App\DTO\Admin\Genre\UpdateGenreDTO;
use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class GenreService
{
    public function get_genres(SearchGenreDTO $data): LengthAwarePaginator
    {
        $genre = Genre::query();

        if (isset($data->name)) {
            $genre->where('name', 'like', '%' . $data->name . '%');
        }

        return $genre->paginate(20);
    }

    public function get_genre(int $id): Genre
    {
        return Genre::query()->findOrFail($id);
    }

    public function store_genre(StoreGenreDTO $data): bool
    {
        try {
            $genre       = new Genre();
            $genre->name = $data->name;
            return $genre->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function update_genre(UpdateGenreDTO $data): bool
    {
        try {
            $genre       = Genre::query()->findOrFail($data->id);
            $genre->name = $data->name;
            return $genre->save();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_genre(int $id): bool
    {
        try {
            $genre = Genre::query()->findOrFail($id);
            return $genre->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
