<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'LocalLandlord') - Landlord Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-900 text-white p-6">
        <div class="mb-8">
            <h1 class="text-2xl font-bold">LocalLandlord</h1>
        </div>

        <nav class="space-y-4">
            <a href="{{ route('landlord.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('landlord.dashboard') ? 'bg-blue-600' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('landlord.properties.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('landlord.properties.*') ? 'bg-blue-600' : '' }}">
                Properties
            </a>
            <a href="{{ route('landlord.traders.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('landlord.traders.*') ? 'bg-blue-600' : '' }}">
                Traders
            </a>
            <hr class="my-4 border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-700">
                    Logout
                </button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <div class="bg-white shadow p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">@yield('page_title', 'Dashboard')</h2>
            <div class="text-sm text-gray-600">
                {{ auth()->user()->name }}
            </div>
        </div>

        <!-- Page Content -->
        <div class="flex-1 overflow-auto p-6">
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
</div>
</body>
</html>
