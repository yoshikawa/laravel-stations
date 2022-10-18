<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール管理画面</title>
</head>

<body>
    <div class='schedule_list'>
        @foreach($movies as $movie)
        <div class='movie_desc'>
            <div class='movie_title'>
                <h2>作品ID：{{ $movie->id }}</h2>
                <h3>作品名：{{ $movie->title }}</h3>
            </div>
            @foreach($movie->schedules as $schedule)
            <div class='movie_schedule'>
                <a href="/admin/schedules/{{ $schedule->id }}">
                    <p>スケジュールID：{{ $schedule->id }}</p>
                    <p>上映開始時刻：{{ $schedule->start_time }}</p>
                    <p>上映終了時刻：{{ $schedule->end_time }}</p>
                    <p>作成日時：{{ $schedule->created_at }}</p>
                    <p>更新日時：{{ $schedule->updated_at }}</p>
                </a>
            </div>
            @endforeach
            @endforeach
        </div>
</body>

</html>