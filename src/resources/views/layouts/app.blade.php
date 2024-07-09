<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="{{ asset('css/default.css')}}">
    @yield('css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="default">
        <div class="header">
            <h1 class="default-header">FashionablyLate</h1>
            @yield('link')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>