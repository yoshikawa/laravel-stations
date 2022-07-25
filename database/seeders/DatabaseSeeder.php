<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Schedule;
use Carbon\CarbonImmutable;
use App\Practice;
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
        $movies = Movie::factory(30)->create();
        $movies->map(function ($movie) {
            for ($i = 0; $i < 10; $i++) {
                Schedule::factory()->create([
                    'movie_id' => $movie->id,
                    'start_time' => CarbonImmutable::now()->addHours($i),
                    'end_time' => CarbonImmutable::now()->addHours($i + 2)
                ]);
            }
        });
        $this->call([
            SheetTableSeeder::class,
        ]);
        Practice::factory(10)->create();
    }
}
