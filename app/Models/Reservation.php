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

    public function Sheets()
    {
        return $this->hasMany(Sheet::class);
    }

    public function Schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function storeReservateion($request)
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

    public static function isAllreadyReserved($schedule_id)
    {
        $returnValueList = Reservation::select("sheet_id")->where("schedule_id", "=", $schedule_id)->get();
        $reservedSheetList = [];

        foreach ($returnValueList as $returnValue) {
            array_push($reservedSheetList, $returnValue->sheet_id);
        }

        return $reservedSheetList;
    }

    public function isAllReadyExist($request)
    {
        return Reservation::where("schedule_id", "=", $request->schedule_id)
            ->where("sheet_id", "=", $request->sheet_id)
            ->exists();
    }
}
