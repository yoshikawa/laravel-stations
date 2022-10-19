<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール登録画面</title>
</head>

<body>
    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endif
    <div class='schedule_create_title'>
        <h1>スケジュール登録フォーム</h1>
    </div>
    <form action='store' method='post' class='schedule_create'>
        <div class='movie_title'>
            <h2>作品ID：{{ $movie->id }}　作品タイトル{{ $movie->title }}</h2>
        </div>
        <div class='movie_schedule'>
            <table>
                <tr>
                    <td>開始日付：<input type='date' name='start_time_date' id='start_time_date'></td>
                    <td>開始時間：<input type='time' name='start_time_time' id='start_time_time'></td>
                </tr>
                <tr>
                    <td>終了日付：<input type='date' name='end_time_date' id='end_time_date'></td>
                    <td>終了時間：<input type='time' name='end_time_time' id='end_time_time'></td>
                </tr>
            </table>
            <input type='submit' value='登録'>
        </div>
    </form>
</body>

</html>