<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Inline Laravel-style red SVG favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjZGMxNDQ3IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZD0iTTEyIDMgTDIgOSA2IDkgNiAxNSAxOCAxNSAxOCA5IDE4IDkgMTIgMTgiLz48L3N2Zz4=" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gradient-to-tr from-gray-900 via-blue-900 to-black text-white min-h-screen">
    <div class="min-h-screen flex flex-col">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Header -->
        @if (isset($header))
            <header class="bg-gray-800 shadow-md rounded-b-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-semibold text-blue-200 tracking-wide">
                        {{ $header }}
                    </h1>
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class=" ">
            <div class=">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 border-t border-gray-700 py-4 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </footer>
    </div>
</body>
</html>
