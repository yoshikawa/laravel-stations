<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::all();
        $query = Movie::query();
        $keyword = $request->input('keyword');
        $status = $request->input('is_showing');
        if (!is_null($status)) {
            if ($status == '2' && !empty($keyword)) {
                $query->where('title', 'like', '%' . $keyword . '%')->orWhere('description', 'like', '%' . $keyword . '%');
            } elseif ($status <> '2' && !empty($keyword)) {
                $query->where('is_showing', $status)
                    ->where(function ($query) use ($keyword) {
                        $query->where('title', 'like', '%' . $keyword . '%')
                            ->orWhere('description', 'like', '%' . $keyword . '%');
                    });
            } elseif ($status <> '2' && empty($keyword)) {
                $query->where('is_showing', $status);
            }
            // var_dump($query->toSql(), $query->getBindings());
            $movies = $query->get();
        }
        return view('indexMovie', ['movies' => $movies]);
    }

    public function show($id)
    {
        $movie = Movie::find($id);
        return view('showMovie', ['movie' => $movie]);
    }
}
