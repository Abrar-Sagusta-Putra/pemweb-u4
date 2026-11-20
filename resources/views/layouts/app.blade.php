
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Portal Berita - Informasi dan artikel teknologi terkini.">

    <title>@yield('title', 'Portal Berita') - Portal Berita</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.nav')

    <main>
        @yield('content')
    </main>

</body>
</html>
