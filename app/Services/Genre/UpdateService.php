<?php

namespace App\Services\Genre;

use App\Models\Genre;

class UpdateService
{
    public function update($data)
    {
        $genre = Genre::query()->find($data['id']);
        if ($this->check_unique_genre($data['name'], $data['id'])) {
            $genre->name = $data['name'];
            $genre->save();
            return true;
        }
        else
        {
            return false;
        }
    }

    private function check_unique_genre($name, $current_genre_id): bool
    {
        $existingGenre = Genre::where('name', $name)
            ->where('id', '!=', $current_genre_id)
            ->first();

        return $existingGenre === null;
    }
}
