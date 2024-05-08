<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 40; $i++) {
            $image = file_get_contents(database_path('data/images/' . $i % 4 . '.jpeg'));
            $newImagePath = 'books/images/' . uniqid() . '.jpeg';

            $text = file_get_contents(database_path('data/text/' . $i % 4 . '.pdf'));
            $newTextPath = 'books/text/' . uniqid() . '.pdf';

            Storage::disk('public')->put($newTextPath, $text);
            Storage::disk('public')->put($newImagePath, $image);

            $book = Book::factory()->create(['image_path' => $newImagePath, 'text_path' => $newTextPath]);
            $book->save();

            $book->authors()->sync(Author::pluck('id')->random((rand(1, 3))));
            $book->genres()->sync(Genre::pluck('id')->random((rand(1, 2))));
            $book->publishers()->sync(Publisher::pluck('id')->random((rand(1, 3))));
        }
    }
}
