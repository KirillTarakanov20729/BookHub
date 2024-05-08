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

        foreach($authorsArray as $authorName) {
            if(trim($authorName) !== '') {
                Author::factory()->create(['name' => $authorName]);
            }
        }
    }
}
