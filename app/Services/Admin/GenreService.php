<?php

namespace App\Services\Admin;

use App\DTO\Admin\Genre\SearchGenreDTO;
use App\DTO\Admin\Genre\StoreGenreDTO;
use App\DTO\Admin\Genre\UpdateGenreDTO;
use App\Http\Filters\GenreFilter;
use App\Models\Genre;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class GenreService
{
    public function get_genres(SearchGenreDTO $data): LengthAwarePaginator
    {

        $filter = app()->make(GenreFilter::class, ['queryParams' => array_filter($data->toArray())]);

        return Genre::filter($filter)->paginate(20)->withQueryString();
    }

    public function get_genre(int $id): Genre
    {
        return Cache::remember('genre_'.$id, 3600, function () use ($id) {
            return Genre::query()->findOrFail($id);
        });
    }

    public function store_genre(StoreGenreDTO $data): bool
    {
        try {
            $genre       = new Genre();
            $genre->name = $data->name;

            $genre->save();

            Cache::put('genre_' . $genre->id, $genre, 3600);
            Cache::forget('genres');

            return true;
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

            $genre->save();

            Cache::put('genre_' . $genre->id, $genre, 3600);
            Cache::forget('genres');

            return true;
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }

    public function delete_genre(int $id): bool
    {
        try {
            $genre = Genre::query()->findOrFail($id);

            Cache::forget('genre_' . $genre->id);
            Cache::forget('genres');

            return $genre->delete();
        } catch(\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
