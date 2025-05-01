<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Mock Dashboard</h1>

<div class="container">
    <h1>Welcome, {{ Auth::user()->nameUsers }}</h1>
    {{-- Your dashboard content here --}}
</div>
</body>
</html>
