<?php

namespace App\Services\Author;

use App\Models\Author;

class UpdateService
{
    public function update($data)
    {
        $author = Author::query()->find($data['id']);
        $author->first_name = $data['first_name'];
        $author->last_name = $data['last_name'];
        if ($this->check_unique_author($data['first_name'] . ' ' . $data['last_name'], $data['id'])) {
            $author->full_name = $data['first_name'] . ' ' . $data['last_name'];
            $author->save();
            return true;
        }
        else
        {
            return false;
        }
    }

    private function check_unique_author($full_name, $current_author_id): bool
    {
        $existingAuthor = Author::where('full_name', $full_name)
            ->where('id', '!=', $current_author_id)
            ->first();

        return $existingAuthor === null;
    }

}
