<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>映画詳細画面</title>
</head>

<body>
    <h2>映画詳細</h2>
</body>
<div class='movie_show'>
    <table>
        <tr>
            <th>映画タイトル</th>
            <td>{{ $movie->title }}</td>
        </tr>
        <tr>
            <th>画像</th>
            <td><img class='movie_img' src='{{ $movie->image_url }}'></td>
        </tr>
        <tr>
            <th>公開年</th>
            <td>{{ $movie->published_year }}</td>
        </tr>
        <tr>
            <th>上映状態</th>
            <td>
                @if($movie->is_showing === 1)
                上映中
                @else
                上映予定
                @endif
            </td>
        </tr>
        <tr>
            <th>概要</th>
            <td>{{ $movie->description }}</td>
        </tr>
        <tr>
            <th>映画情報作成日時</th>
            <td>{{date('Y-m-d H:i:s', strtotime($movie->created_at));}}</td>
        </tr>
        <tr>
            <th>映画情報更新日時</th>
            <td>{{date('Y-m-d H:i:s', strtotime($movie->updated_at));}}</td>
        </tr>
        <tr>
            <th>開始</th>
            <td>終了</td>
        </tr>
        @foreach($movie->schedules as $schedule)
        <tr>
            <!-- TODO: H:iに直す -->
            <td>{{date('h:i', strtotime($schedule->start_time));}}</td>
            <td>{{date('h:i', strtotime($schedule->end_time));}}</td>
            <td>
                <a href="/movies/{{$movie->id}}/schedules/{{$schedule->id}}/sheets?screening_date={{date('Y-m-d', strtotime($schedule->start_time))}}">
                    <button type="button">座席を予約する</button>
                </a>
            </td>
        </tr>
        <tr>
            <th>上映情報作成日時</th>
            <td>{{date('Y-m-d H:i:s', strtotime($schedule->created_at));}}</td>
        </tr>
        <tr>
            <th>上映情報更新日時</th>
            <td>{{date('Y-m-d H:i:s', strtotime($schedule->updated_at));}}</td>
        </tr>
        @endforeach
    </table>
</div>

</html>