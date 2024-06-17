<?php

namespace Database\Seeders;

use App\Models\Songs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songs::create([
            "title" => "Habiba",
            "artist" => "Boef-Man",
            "duration" => 160,
            "genre_id" => 1
        ]);

        Songs::factory()->count(5000)->create();
    }
}
