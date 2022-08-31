<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>

<body>
    <table>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>タイトル: {{ $movie->title }}</td>
                <td>画像: {{ $movie->image_url }}</td>
                <td>公開年: {{ $movie->published_year }}</td>
                @if ($movie->is_showing)
                <td>上映: 上映中</td>
                @else
                <td>上映: 上映予定</td>
                @endif
                <td>概要: {{ $movie->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>