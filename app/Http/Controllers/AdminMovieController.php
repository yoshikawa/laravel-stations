<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Exception;

class AdminMovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('getAdminMovie', ['movies' => $movies]);
    }

    public function create()
    {
        return view('getAdminMovie');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                "title" => 'required|unique:movies,title',
                "image_url" => 'required|url',
                "published_year" => 'required|numeric',
                "is_showing" => 'required',
                "description" => 'required',
            ]
        );

        Movie::create([
            "title" => $validate['title'],
            "image_url" => $validate['image_url'],
            "published_year" => $validate['published_year'],
            "is_showing" => $validate['is_showing'],
            "description" =>  $validate['description'],
        ]);

        return redirect("admin/movies/index");
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('editMovie')->with(['movie' => $movie]);
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request)
    {
        $request->validate(
            [
                "title" => 'required|unique:movies,title',
                "image_url" => 'required|url',
                "published_year" => 'required|numeric',
                "is_showing" => 'required',
                "description" => 'required',
            ]
        );
        Movie::where('id', '=', $request->id)
            ->update([
                'title'       => $request->title,
                'image_url'   => $request->image_url,
                'description' => $request->description,
                'is_showing'  => $request->is_showing,
                'published_year' => $request->published_year,
            ]);
        return response()->view('getAdminMovie', ['movies' => Movie::all()], 302);
    }
}
