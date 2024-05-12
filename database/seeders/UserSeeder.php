<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(30)->create();
        User::factory(1)->create(['name' => 'admin','email' => 'admin@mail.ru','password' => 'password' ,'is_admin' => 1]);
    }
}
