<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール詳細画面</title>
</head>

<body>
    <div class='schedule_desc'>
        <table>
            <tr>
                <th>スケジュールID</th>
                <td>{{ $schedule->id }}</td>
            </tr>
            <tr>
                <th>映画ID</th>
                <td>{{ $schedule->movie_id }}</td>
            </tr>
            <tr>
                <th>上映開始時間</th>
                <td>{{ $schedule->start_time }}</td>
            </tr>
            <tr>
                <th>上映終了時間</th>
                <td>{{ $schedule->end_time }}</td>
            </tr>
            <tr>
                <th>スケジュール作成日時</th>
                <td>{{ $schedule->created_at }}</td>
            </tr>
            <tr>
                <th>スケジュール作成日時</th>
                <td>{{ $schedule->updated_at }}</td>
            </tr>
        </table>
        <a href="/admin/schedules/{{ $schedule->id }}/edit"><button type='button' class='btn-edit'>編集</button></a>
        <form action='/admin/schedules/{{ $schedule->id }}/destroy' method='post'>
            {{ csrf_field() }}
            @method('delete')
            <input type='submit' class='btn-dell' value='削除' onClick='return confirm("本当に削除しますか？");'>
        </form>
    </div>
</body>

</html>