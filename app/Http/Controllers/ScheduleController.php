<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Movie;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::all();

        return view('schedule/index', ['movies' => $movies]);
    }

    public function show($id)
    {
    }

    public function create()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }
}
