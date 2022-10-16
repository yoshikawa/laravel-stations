<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::search($request);
        return view('index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return view('showMovie', ['movie' => $movie]);
    }
}
