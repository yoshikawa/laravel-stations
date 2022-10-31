<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }

    public function Schedules()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function storeReservation($request)
    {
        DB::transaction(function () use ($request) {
            Reservation::create([
                "screening_date" => $request->screening_date,
                "schedule_id" => $request->schedule_id,
                "sheet_id" => $request->sheet_id,
                "email" => $request->email,
                "name" => $request->name,
            ]);
        });
    }

    public static function updateReservation($reservation_id, $request)
    {
        DB::transaction(function () use ($reservation_id, $request) {
            Reservation::where('id', '=', $reservation_id)
                ->update([
                    "screening_date" => $request->screening_date,
                    "schedule_id"    => $request->schedule_id,
                    "sheet_id" => $request->sheet_id,
                    "email"    => $request->email,
                    "name"     => $request->name,
                ]);
        });
    }

    public static function deleteReservation($reservation_id)
    {
        DB::transaction(function () use ($reservation_id) {
            Reservation::where('id', '=', $reservation_id)
                ->delete();
        });
    }

    public static function getIdOfMovieReservated()
    {
        return Reservation::select('movies.id as movie_id')
            ->join("schedules", "schedules.id", "=", 'reservations.schedule_id')
            ->join("movies", "movies.id", "=", "schedules.movie_id")
            ->first();
    }

    public static function isExist($reservation_id)
    {
        return Reservation::where('id', '=', $reservation_id)->exists();
    }


    public static function isAlreadyReserved($schedule_id)
    {
        $returnValueList = Reservation::select("sheet_id")->where("schedule_id", "=", $schedule_id)->get();
        $reservedSheetList = [];

        foreach ($returnValueList as $returnValue) {
            array_push($reservedSheetList, $returnValue->sheet_id);
        }

        return $reservedSheetList;
    }

    public function isAlreadyExist($request)
    {
        return Reservation::where("schedule_id", "=", $request->schedule_id)
            ->where("sheet_id", "=", $request->sheet_id)
            ->exists();
    }

    public function isReserved($request, $schedule_id)
    {
        return Reservation::where("schedule_id", "=", $schedule_id)
            ->where("sheet_id", "=", $request->sheetId)
            ->exists();
    }
}
