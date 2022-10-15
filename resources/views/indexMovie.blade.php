</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <link rel="stylesheet" href="\css\app.css">
</head>

<body>
    <div class="searchField">
        <form action="/movies">
            <input type="text" name=keyword>
            <div>
                <input type="radio" name="is_showing" value="all" checked><label for="">すべて</label>
                <input type="radio" name="is_showing" value="1"><label for="">公開中</label>
                <input type="radio" name="is_showing" value="0"><label for="">公開予定</label>
            </div>
            <input type="submit" value="検索">
        </form>
    </div>
    <div class='movies'>
        <h2>映画一覧</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>上映中かどうか</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </thead>
            @foreach ($movies as $movie)
            <tbody>
                <td>{{ $movie->id }}</td>
                <td><a href="/movies/{{$movie->id}}">{{ $movie->title }}</a></td>
                <td>{{ $movie->image_url }}</td>
                <td>{{ $movie->published_year }}</td>
                @if($movie->is_showing == 1)
                <td>上映中</td>
                @else
                <td>上映予定</td>
                @endif
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->created_at }}</td>
                <td>{{ $movie->updated_at }}</td>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>