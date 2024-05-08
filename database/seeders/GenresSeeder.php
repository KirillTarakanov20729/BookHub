<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres      = File::get(database_path('data/genres.txt'));
        $genresArray = explode("\n", $genres);

        foreach($genresArray as $genreName) {
            if(trim($genreName) !== '') {
                Genre::factory()->create(['name' => $genreName]);
            }
        }
    }
}
