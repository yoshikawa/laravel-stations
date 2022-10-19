<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>スケジュール新規登録完了</title>
</head>

<body>
    以下のデータを正常に登録しました。
    <div class='movie_title'>
        <h2>作品ID：{{ $request->movie_id }}　作品タイトル{{ $request->movie_title }}</h2>
    </div>
    <div class='movie_schedule'>
        <table>
            <tr>
                <td>開始日付：{{ DateTime::createFromFormat('Y-m-d', $request->start_time_date)->format('Y/m/d') }}</td>
                <td>開始時間：{{ DateTime::createFromFormat('H:i', $request->start_time_time)->format('H時i分') }}</td>
            </tr>
            <tr>
                <td>終了日付：{{ DateTime::createFromFormat('Y-m-d', $request->end_time_date)->format('Y/m/d') }}</td>
                <td>終了時間：{{ DateTime::createFromFormat('H:i',$request->end_time_time)->format('H時i分') }}</td>
            </tr>
        </table>
    </div>
</body>

</html>