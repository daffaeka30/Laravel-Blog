<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Daffa Eka Putri',
            'email' => 'daffaekaputri30@gmail.com',
            'password' => bcrypt('password'),
        ]);
        
        Category::factory(50)->create();
    }
}
