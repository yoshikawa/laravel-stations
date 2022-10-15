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
            <td>{{ $movie->created_at }}</td>
        </tr>
        <tr>
            <th>映画情報更新日時</th>
            <td>{{ $movie->updated_at }}</td>
        </tr>
    </table>
</div>

</html>