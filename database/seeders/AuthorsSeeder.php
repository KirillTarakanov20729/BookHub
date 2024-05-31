<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = File::get(database_path('data/authors.txt'));
        $authorsArray = explode("\n", $authors);

        foreach ($authorsArray as $authorData) {
            $authorParts = explode(" ", $authorData);

            if (count($authorParts) == 3) {
                $author = new Author;

                $author->last_name   = $authorParts[0];
                $author->first_name  = $authorParts[1];
                $author->middle_name = $authorParts[2];
                $author->full_name   = $authorParts[0] . ' ' . $authorParts[1] . ' ' . $authorParts[2];
                $author->save();
            } elseif (count($authorParts) == 2) {
                $author = new Author;

                $author->last_name  = $authorParts[0];
                $author->first_name = $authorParts[1];
                $author->full_name  = $authorParts[0] . ' ' . $authorParts[1];
                $author->save();
            }

        }
    }
}
