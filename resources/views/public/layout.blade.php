<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'LocalLandlord') - Public</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="min-h-screen bg-gray-100">
    <!-- Top Bar -->
    <div class="bg-white shadow p-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-xl font-semibold">LocalLandlord</a>
        <div class="flex items-center gap-3 text-sm">
            <a href="{{ route('landlord.traders.index') }}" class="px-3 py-2 rounded hover:bg-gray-100">Traders</a>
            @auth
                <a href="{{ route('landlord.dashboard') }}" class="px-3 py-2 rounded hover:bg-gray-100">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded hover:bg-gray-100">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-3 py-2 rounded hover:bg-gray-100">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-2 rounded hover:bg-gray-100">Register</a>
            @endauth
        </div>
    </div>

    <!-- Page Title -->
    <div class="bg-white shadow p-4">
        <h2 class="text-xl font-semibold">@yield('page_title', '')</h2>
    </div>

    <!-- Page Content -->
    <div class="max-w-7xl mx-auto p-6">
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>
</body>
</html>