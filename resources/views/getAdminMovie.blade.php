<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie管理画面</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <script>
        @if(session('flashmessage'))
        $(function() {
            toastr.success('{{ session('
                flashmessage ') }}');
        });
        @endif
    </script>
    <div class='movies'>
        <h2>映画一覧</h2>
        <table>
            <thead>
                <th>ID</th>
                <th>映画タイトル</th>
                <th>画像URL</th>
                <th>公開年</th>
                <th>上映予定</th>
                <th>概要</th>
                <th>登録日時</th>
                <th>更新日時</th>
            </thead>
            @foreach ($movies as $movie)
            <tbody>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->image_url }}</td>
                <td>{{ $movie->published_year }}</td>
                @if($movie->is_showing === 1)
                <td>上映中</td>
                @else
                <td>上映予定</td>
                @endif
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->created_at }}</td>
                <td>{{ $movie->updated_at }}</td>
                <td><a href="/admin/movies/{{ $movie->id }}/edit"><button type='button' class='btn-edit'>編集</button></a></td>
                <td>
                    <form action='/admin/movies/{{ $movie->id }}/destroy' method='post'>
                        {{ csrf_field() }}
                        <input type='submit' class='btn-dell' value='削除' onClick='return confirm("本当に削除しますか？");'>
                    </form>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>