
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        @include('components.nav') <!-- Подключаем компонент навигации -->
    </header>

    <main>
        @yield('content') <!-- Сюда будут подгружаться уникальные части страниц -->
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} HilfNachbar</p>
    </footer>
</body>
</html>