<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Snor')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-950 text-gray-100 antialiased">
    <header class="border-b border-white/10 bg-gray-900/60 backdrop-blur">
        <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
            <a href="{{ route('index') }}" class="text-lg font-semibold tracking-wide">
                #00 Snor
            </a>
            <nav class="flex items-center gap-6 text-sm text-gray-300">
                <a href="{{ route('blog.index') }}" class="hover:text-white transition">Блог</a>
                <a href="#" class="hover:text-white transition">О проекте</a>

                 @auth
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.posts.index') }}" class="text-sm">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-red-600 hover:text-red-500">Выйти</button>
                    </form>
                </div>
            @endauth
            @guest
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-sm">Войти</a>
                    <a href="{{ route('register') }}" class="text-sm">Регистрация</a>
                </div>
            @endguest
            </nav>
        </div>
    </header>
    <main class="mx-auto max-w-6xl px-4 py-10">
        @yield('content')
    </main>
</body>
</html>