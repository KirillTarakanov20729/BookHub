<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = File::get(database_path('data/features.txt'));
        $featuresArray = explode("\n", $features);

        foreach($featuresArray as $featureName) {
            if(trim($featureName) !== '') {
                Feature::factory()->create(['name' => $featureName]);
            }
        }
    }
}
