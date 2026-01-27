<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'LocalLandlord') - Trader Workspace</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-900 text-white p-6 flex flex-col">
        <div class="mb-8">
            <h1 class="text-2xl font-bold tracking-tight">
                <span class="text-cyan-400">Local</span><span class="text-amber-300">Trader</span>
            </h1>
            <p class="text-xs text-gray-400 mt-1">Manage your services & jobs</p>
        </div>

        <nav class="space-y-2 flex-1">
            <a href="{{ route('trader.dashboard') }}"
               class="flex items-center gap-2 px-4 py-2 rounded text-sm hover:bg-gray-700
                      {{ request()->routeIs('trader.dashboard') ? 'bg-cyan-600 text-white' : 'text-gray-100' }}">
                <span>Dashboard</span>
            </a>
            <a href="{{ route('trader.profile.edit') }}"
               class="flex items-center gap-2 px-4 py-2 rounded text-sm hover:bg-gray-700
                      {{ request()->routeIs('trader.profile.*') ? 'bg-cyan-600 text-white' : 'text-gray-100' }}">
                <span>Profile</span>
            </a>
            <a href="{{ route('trader.trade-category') }}"
               class="flex items-center gap-2 px-4 py-2 rounded text-sm hover:bg-gray-700
                      {{ request()->routeIs('trader.trade-category') ? 'bg-cyan-600 text-white' : 'text-gray-100' }}">
                <span>Services</span>
            </a>
            <a href="{{ route('trader.trade-location') }}"
               class="flex items-center gap-2 px-4 py-2 rounded text-sm hover:bg-gray-700
                      {{ request()->routeIs('trader.trade-location') ? 'bg-cyan-600 text-white' : 'text-gray-100' }}">
                <span>Locations</span>
            </a>
            <a href="{{ route('trader.jobs') }}"
               class="flex items-center gap-2 px-4 py-2 rounded text-sm hover:bg-gray-700
                      {{ request()->routeIs('trader.jobs') ? 'bg-cyan-600 text-white' : 'text-gray-100' }}">
                <span>Jobs</span>
            </a>
        </nav>

        <div class="mt-6 pt-4 border-t border-gray-700">
            <div class="flex items-center justify-between text-xs text-gray-300 mb-3">
                <span>{{ auth()->user()->name }}</span>
                <span class="px-2 py-0.5 rounded-full bg-gray-800 text-cyan-300">Trader</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2 rounded bg-gray-800 hover:bg-red-500 text-sm text-gray-100 hover:text-white transition">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Bar -->
        <div class="bg-white shadow p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold">@yield('page_title', 'Dashboard')</h2>
        </div>

        <!-- Page Content -->
        <div class="flex-1 overflow-auto p-6">
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded text-sm">
                    <ul class="list-disc list-inside space-y-1">
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

