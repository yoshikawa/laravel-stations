<?php

namespace Tests\Feature\LaravelStations\Station14;

use App\Models\Movie;
use App\Models\Schedule;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @group station14
     */
    public function test映画詳細ページが表示されるか(): void
    {
        $movie = $this->createMovie();
        $response = $this->get('/movies/'.$movie->id);
        $response->assertStatus(200);
        $response->assertSeeText($movie->title);
        $response->assertSee($movie->image_url);
        $response->assertSeeText($movie->published_year);
        $response->assertSeeText($movie->description);
    }

    /**
     * @group station14
     */
    public function test映画スケジュールのリレーションが存在する(): void
    {
        $movie = $this->createMovie();
        $this->createSchedule($movie->id);

        $movie = Movie::with('schedules')->find($movie->id);
        $this->assertCount(10, $movie->schedules);
    }

    /**
     * @group station14
     */
    public function test映画詳細ページに紐づくスケジュールが表示されているか(): void
    {
        $movie = $this->createMovie();
        $this->createSchedule($movie->id);
        $movie = Movie::with('schedules')->find($movie->id);

        $response = $this->get('/movies/'.$movie->id);
        $response->assertStatus(200);

        foreach ($movie->schedules as $schedule) {
            $response->assertSeeText($schedule->start_time->format('h:m'));
            $response->assertSeeText($schedule->end_time->format('h:m'));
        }
    }

    private function createMovie(): Movie
    {
        $movieId = Movie::insertGetId([
            'title' => '最初からある映画',
            'image_url' => 'https://techbowl.co.jp/_nuxt/img/6074f79.png',
            'published_year' => 2000,
            'description' => '概要',
            'is_showing' => false
        ]);
        return Movie::find($movieId);
    }

    private function createSchedule(int $movieId): void
    {
        $count = 10;
        for ($i = 0; $i < $count; $i++) {
            Schedule::insert([
                'movie_id' => $movieId,
                'start_time' => CarbonImmutable::now()->addHours($i),
                'end_time' => CarbonImmutable::now()->addHours($i + 2),
            ]);
        }
    }
}
