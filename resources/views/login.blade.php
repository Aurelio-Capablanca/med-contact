<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<h1>Login</h1>

@if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email:</label>
    <input type="text" name="email" id="email"><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password"><br><br>

    <button type="submit">Login</button>
</form>
</body>
</html>
