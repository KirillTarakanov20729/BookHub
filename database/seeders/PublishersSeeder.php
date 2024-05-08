<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publishers = File::get(database_path('data/publishers.txt'));
        $publishersArray = explode("\n", $publishers);

        foreach($publishersArray as $publisherName) {
            if(trim($publisherName) !== '') {
                Publisher::factory()->create(['name' => $publisherName]);
            }
        }
    }
}
