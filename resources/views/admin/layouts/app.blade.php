<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass {
            background: rgba(37, 24, 39, 0.7);
            backdrop-filter: blur(12px);
        }
        .btn {
            @apply inline-flex items-center justify-center rounded-xl px-3 py-2 text-sm font-medium;
        }
        .btn-primary {
            @apply text-gray-900;
            background: linear-gradient(135deg, #2263ee, #478bfa, #7472b6);
        }
        .btn-outline {
            @apply border border-white/15 text-gray-200 hover:border-white/30;
        }
        .input {
            @apply w-full rounded-xl bg-white/5 border border-white/10 px-3 py-2 text-sm outline-none focus:border-white/30 placeholder:text-gray-400;
        }
        .badge {
            @apply inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-xs border border-white/15 text-gray-300;
        }
    </style>
</head>
<body class="bg-gray-950 text-gray-100 min-h-screen">
    <!-- Header -->
    <header class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button class="btn btn-outline">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-2">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-gray-900 font-black">A</span>
                    <span class="font-semibold">Admin</span>
                </a>
            </div>
            <div class="flex items-center gap-3">
                <span class="hidden sm:inline text-sm text-gray-400">Welcome, Admin</span>
                <button class="btn btn-outline">Logout</button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 grid grid-cols-1 md:grid-cols-12 gap-6">
        <!-- Sidebar -->
        <aside class="md:col-span-3 lg:col-span-2 glass rounded-2xl p-3 border border-white/10 md:block hidden">
            <div class="space-y-1">
                <a href="/posts" class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm text-white bg-white/5">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12h6m-3-3v6m-9 1V7a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                    Posts
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 rounded-xl px-3 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5">
                    Analytics
                </a>
            </div>
        </aside>

        <!-- Content Area -->
        <section class="md:col-span-9 lg:col-span-10 space-y-6">
            @yield('content')
        </section>
    </main>
</body>
</html>