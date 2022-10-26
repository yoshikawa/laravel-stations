<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    protected $dates = [
        'start_time',
        'end_time'
    ];

    public function Movies()
    {
        return $this->belongsTo(Movie::class);
    }

    public function storeSchedule($request)
    {
        DB::transaction(function () use ($request) {
            Schedule::create([
                'movie_id'   => $request->movie_id,
                'start_time' => $request->start_time_date . " " . $request->start_time_time,
                'end_time'   => $request->end_time_date . " " . $request->end_time_time,
            ]);
        });
    }

    public function updateSchedule($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            Schedule::where('id', '=', $id)
                ->update([
                    'start_time' => $request->start_time_date . " " . $request->start_time_time,
                    'end_time'   => $request->end_time_date . " " . $request->end_time_time,
                ]);
        });
    }
}
