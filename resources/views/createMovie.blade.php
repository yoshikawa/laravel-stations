<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie新規登録</title>
</head>

<body>
    @if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endif
    <form action='store' method='post' class='movie_create_form'>
        @csrf
        <table>
            <div class='movie_create_form'>
                <tr>
                    <th><label for='title'>映画タイトル：</label></th>
                    <td><input type='text' name='title' id='title'></td>
                </tr>
            </div>
            <div class='movie_create_form'>
                <tr>
                    <th><label for='image_url'>画像URL：</label></th>
                    <td><input type='url' name='image_url' id='image_url'></td>
                </tr>
            </div>
            <div class='movie_create_form'>
                <tr>
                    <th><label for='published_year'>公開年：</label></th>
                    <td><input type='number' max=9999 name='published_year' id='published_year'></td>
                </tr>
            </div>
            <div class='movie_create_form'>
                <tr>
                    <th><label for='is_showing'>上映予定 ：</label></th>
                    <td><input type='checkbox' name='is_showing' id='is_showing' value=1></td>
                </tr>
            </div>
            <div class='movie_create_form'>
                <tr>
                    <th><label for='description'> 概要：</label></th>
                    <td><textarea name='description' id='description' rows='5' cols='35'></textarea></td>
                </tr>
            </div>
        </table>
        <div class='movie_create_form'>
            <input type='submit' value='登録'>
        </div>
    </form>
</body>

</html>