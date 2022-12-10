<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Director;
use App\Models\Film;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Film::truncate();
        Genre::truncate();
        Director::truncate();
        User::truncate();

        $user = User::factory()->create();

        $genre1 = Genre::factory()->create();
        $genre2 = Genre::factory()->create();
        $genre3 = Genre::factory()->create();
        
        $director1 = Director::factory()->create();
        $director2 = Director::factory()->create();

        Film::factory(2)->create([
            'genre' => $genre1->id,
            'director' => $director1->id,
            'user' => $user->id
        ]);

        Film::factory(2)->create([
            'genre' => $genre3->id,
            'director' => $director1->id,
            'user' => $user->id
        ]);

        Film::factory(2)->create([
            'genre' => $genre2->id,
            'director' => $director2->id,
            'user' => $user->id
        ]);
    }
}
