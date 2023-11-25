<?php

namespace App\Services\Genre;


use App\Models\Genre;

class StoreService
{
    public function store($data) : bool
    {
        $genre = new Genre;
        $genre->name = $data['name'];
        if ($this->check_unique_genre($data['name'])) {
            $genre->name = $data['name'];
            $genre->save();
            return true;
        }
        else
        {
            return false;
        }
    }

    private function check_unique_genre($name) : bool
    {
        $existingGenre = Genre::where('name', $name)->first();

        return $existingGenre === null;
    }
}
