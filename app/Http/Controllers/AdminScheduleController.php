<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use Exception;

class AdminScheduleController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin/schedules/index', ['movies' => $movies]);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);
        return view('admin/schedules/show', ['schedule' => $schedule]);
    }

    public function create($id)
    {
        $movie = Movie::find($id);
        return view('admin/schedules/create', ['movie' => $movie]);
    }

    public function store(ScheduleRequest $request)
    {
        try {
            $post = new Schedule();
            $post->movie_id = $request->movie_id;
            $post->start_time = $request->start_time_time;
            $post->end_time = $request->end_time_time;
            $post->save();
            return response()->view('admin/schedules/store', ['request' => $request], 302);
        } catch (Exception $e) {
            session()->flash('fhashmessage', 'エラーが発生しました。');
            return redirect('admin/schedules/create');
        }
    }

    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('admin/schedules/edit', ['schedule' => $schedule]);
    }
    public function update(ScheduleRequest $request)
    {
        try {
            $schedule = Schedule::find($request->id);
            $schedule->start_time = $request->start_time_time;
            $schedule->end_time = $request->end_time_time;
            $schedule->save();
            return response()->view('admin/schedules/update', ['request' => $request], 302);
        } catch (Exception $e) {
            session()->flash('fhashmessage', 'エラーが発生しました。');
            return redirect('admin/schedules/edit', ['request' => $request]);
        }
    }
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        if (is_null($schedule)) {
            abort(404);
        }
        $schedule->delete();
        session()->flash('flashmessage', '映画の削除が完了しました。');
        return redirect('/admin/schedules');
    }
}
