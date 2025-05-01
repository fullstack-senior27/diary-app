<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>1行日記</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">1行日記</h1>
        @yield('content')
    </div>
</body>
</html>
