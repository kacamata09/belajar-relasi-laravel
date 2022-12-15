<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <form action="/register" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td><input type="password" name="password_confirmation"></td>
            </tr>
        </table>
        <button type="submit">Simpan</button>
    </form>


</body>
</html>