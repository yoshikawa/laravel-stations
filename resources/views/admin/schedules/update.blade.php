<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie更新完了</title>
</head>

<body>
    以下のデータを正常に登録しました。
    <table>
        <tr>
            <th><label for='id'>スケジュールID：</label></th>
            <td>{{ $request->id }}</td>
        </tr>
        <tr>
            <th><label for='start_time_date'>上映開始日：</label></th>
            <td>{{ $request->start_time_date }}</td>
        </tr>

        <tr>
            <th><label for='start_time_time'>上映開始時間：</label></th>
            <td>{{ $request->start_time_time }}</td>
        </tr>
        <tr>
            <th><label for='end_time_date'>上映終了日：</label></th>
            <td>{{ $request->end_time_date }}</td>
        </tr>
        <tr>
            <th><label for='end_time_time'>上映開始時間：</label></th>
            <td>{{ $request->end_time_time }}</td>
        </tr>
    </table>
    </form>
</body>

</html>