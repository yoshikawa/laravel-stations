<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sheet;

class SheetController extends Controller
{
    public function index(Request $request)
    {
        $sheets = Sheet::all();
        return view('sheet/index', ['sheets'=> $sheets]);
    }
}
