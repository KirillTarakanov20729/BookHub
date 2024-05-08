<?php

namespace Database\Seeders;

use App\Models\AgeLimit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AgeLimitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $age_limits      = File::get(database_path('data/age-limits.txt'));
        $age_limitsArray = explode("\n", $age_limits);

        foreach ($age_limitsArray as $age_limit) {
            if (trim($age_limit) !== '') {
                AgeLimit::factory()->create(['age_limit' => $age_limit]);
            }
        }
    }
}
