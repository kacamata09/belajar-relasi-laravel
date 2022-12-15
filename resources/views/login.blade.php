@extends('snippets.main')

@section('konten')
<h2>Login</h2>
<form action="/login" method="POST">
    @csrf
    <table>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
    </table>
    <input type="submit" value="Login">
    </form>

    <a href="/register">Daftar Akun</a>
@endsection

    