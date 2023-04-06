<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda Customer</title>
</head>

<body>
    <center>
        <h3>Ini Beranda</h3>

        @auth
            <p>Anda Sudah Login, <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></p>
        @endauth

        @guest
            <p>Anda belum <a href="{{ route('login.page') }}">login</a></p>
            <p>Jika anda belum punya akun <a href="{{ route('register.page') }}">register</a></p>
        @endguest
    </center>

</body>

</html>
