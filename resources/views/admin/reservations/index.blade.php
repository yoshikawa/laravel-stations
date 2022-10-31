<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservations</title>
    <link rel="stylesheet" href="\css\app.css">
</head>

<body>
    @if (session('message'))
    <p>{{ session('message') }}</p>
    @endif
    <table class="reservationTable">
        @foreach ($reservations as $reservation)
        <tr>
            <td>
                <a href="/admin/reservations/{{$reservation->id}}/edit">
                    <button type="button">編集</button>
                </a>
            </td>
            <td>
                <form action="/admin/reservations/{{$reservation->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return finalCheck()">削除</button>
                </form>
            </td>
            <td>{{$reservation->screening_date}}</td>
            <td>{{$reservation->name}}</td>
            <td>{{$reservation->email}}</td>
            <td>{{strtoupper($reservation->sheet->row.$reservation->sheet->column)}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>