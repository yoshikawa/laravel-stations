<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Sheet;

class SheetController extends Controller
{
    public function index()
    {
        return view('sheet/list', [
            "sheets" => Sheet::all()
        ]);
    }
}
