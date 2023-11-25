<?php

namespace App\Services\Author;

use App\Models\Author;

class StoreService
{
    public function store($data) : bool
    {
        $author = new Author;
        $author->first_name = $data['first_name'];
        $author->last_name = $data['last_name'];
        if ($this->check_unique_author($data['first_name'] . ' ' . $data['last_name'])) {
            $author->full_name = $data['first_name'] . ' ' . $data['last_name'];
            $author->save();
            return true;
        }
        else
        {
            return false;
        }
    }

    private function check_unique_author($full_name) : bool
    {
        $existingAuthor = Author::where('full_name', $full_name)->first();

        return $existingAuthor === null;
    }

}
