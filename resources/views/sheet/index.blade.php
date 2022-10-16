<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>シート一覧</title>
</head>
<body>
    <div class='sheets_all'>
        <table>
            <tbody>
                <tr>
                    <td>:-:</td>
                    <td>:-:</td>
                    <td>:-:</td>
                    <td>:-:</td>
                    <td>:-:</td>
                </tr>
                @foreach($sheets as $sheet)
                @if($sheet->column == 1)
                    <tr>
                @endif
                <td>{{ $sheet->row }}-{{ $sheet->column }}</td>
                @if($sheet->column == 5)
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>