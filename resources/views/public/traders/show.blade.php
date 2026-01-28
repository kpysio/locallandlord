@extends('public.layout')

@section('title', ($trader->business_name ?? $trader->user->name) . ' | Trader Profile')
@section('page_title', 'Trader Profile')

@section('content')
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Page Header (Admin-style card) -->
        <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-semibold">{{ $trader->business_name ?? $trader->user->name }}</h1>
                <p class="text-sm text-gray-600">
                    {{ implode(', ', $trader->tradeCategories->pluck('name')->take(3)->toArray()) ?: 'Trusted local trader' }}
                </p>
            </div>
            <div class="hidden sm:block">
                @php $cleanPhone = preg_replace('/\s+/', '', $trader->phone ?? ''); @endphp
                <a href="{{ $cleanPhone ? 'tel:'.$cleanPhone : '#' }}" class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Call</a>
                <a href="mailto:{{ $trader->user->email }}" class="ml-2 px-3 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Email</a>
            </div>
        </div>

        <!-- Opening banner & header (Card) -->
        <div class="mt-6 bg-white rounded-lg shadow overflow-hidden relative">
            <div class="h-56 md:h-72 w-full bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-500">
                <img class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-70" src="https://images.unsplash.com/photo-1523419409543-a7f0f91a3939?q=80&w=1160&auto=format&fit=crop" alt="Banner">
            </div>
            <div class="absolute -bottom-10 left-4 flex items-center gap-3">
                <div class="w-20 h-20 rounded-full ring-4 ring-white overflow-hidden shadow">
                    <img src="https://images.unsplash.com/photo-1572985228311-5aec9f0859f7?q=80&w=1162&auto=format&fit=crop" alt="Logo" class="w-full h-full object-cover" />
                </div>
                <div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-white drop-shadow">{{ $trader->business_name ?? $trader->user->name }}</h2>
                    <p class="text-white/90 text-sm">
                        {{ implode(', ', $trader->tradeCategories->pluck('name')->take(3)->toArray()) ?: 'Trusted local trader' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Lower: telephone reveal + CTAs (Cards) -->
        <div class="mt-14 grid sm:grid-cols-2 gap-6">
            <!-- Tel: click to reveal -->
            <div class="bg-white rounded-lg shadow p-5">
                <p class="text-xs text-gray-500">Telephone</p>
                @php $cleanPhone = preg_replace('/\s+/', '', $trader->phone ?? ''); @endphp
                <button id="showTelBtn" class="mt-2 px-3 py-2 rounded bg-green-600 text-white hover:bg-green-700">Show telephone</button>
                <a id="telNumber" href="{{ $cleanPhone ? 'tel:'.$cleanPhone : '#' }}" class="hidden mt-3 block text-lg font-medium text-green-700">
                    {{ $trader->phone ?? '—' }}
                </a>
            </div>

            <!-- CTAs: callback, email, sms, website -->
            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 py-2 rounded bg-orange-600 text-white hover:bg-orange-700">Add to callback</button>
                    <a href="mailto:{{ $trader->user->email }}" class="px-3 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Email</a>
                    <a href="{{ $cleanPhone ? 'sms:'.$cleanPhone : '#' }}" class="px-3 py-2 rounded bg-purple-600 text-white hover:bg-purple-700">SMS</a>
                    <a href="#" class="px-3 py-2 rounded bg-teal-600 text-white hover:bg-teal-700">Website</a>
                </div>
            </div>
        </div>

        <!-- Reminder (Card) -->
        <div class="mt-6">
            <div class="rounded-lg p-4 bg-white shadow border border-yellow-200">
                <p class="text-sm"><strong>Reminder:</strong> Always verify ID and ask for references. Use call back to arrange a safe contact.</p>
            </div>
        </div>

        <!-- Rating summary (Card) -->
        <div class="mt-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    @for ($s = 0; $s < 5; $s++)
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 {{ $s < 5 ? 'text-yellow-500' : 'text-gray-300' }}">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L3.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                        </svg>
                    @endfor
                    <span class="text-sm font-medium">4.7/5 (3 reviews)</span>
                </div>
                <div class="text-sm text-gray-600">Member since: {{ $trader->created_at->format('M Y') }}</div>
            </div>
        </div>

        <!-- Details: services, locations, gallery, reviews (Cards) -->
        <div class="mt-6 space-y-6">
            <!-- Services -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Services Offered</h3>
                <div class="flex flex-wrap gap-2">
                    @forelse ($trader->tradeCategories as $cat)
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs">{{ $cat->name }}</span>
                    @empty
                        <p class="text-sm text-gray-500">No services listed yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Locations -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Covered Locations</h3>
                <div class="flex flex-wrap gap-2">
                    @forelse ($trader->tradeLocations as $loc)
                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-xs">{{ $loc->name }}</span>
                    @empty
                        <p class="text-sm text-gray-500">No locations listed yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Gallery -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Gallery</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="aspect-square overflow-hidden rounded">
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1389&auto=format&fit=crop" alt="Gallery item" class="w-full h-full object-cover" />
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Reviews -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-semibold mb-3">Reviews</h3>
                <div class="space-y-4">
                    @foreach ([
                        ['name' => 'Alice', 'rating' => 5, 'text' => 'Great service and professional work.'],
                        ['name' => 'Bob', 'rating' => 4, 'text' => 'Very satisfied with the results.'],
                        ['name' => 'Carol', 'rating' => 5, 'text' => 'Highly recommended!'],
                    ] as $review)
                        <div class="border border-gray-200 rounded p-4">
                            <div class="flex items-center justify-between">
                                <p class="font-medium">{{ $review['name'] }}</p>
                                <div class="flex">
                                    @for ($s = 0; $s < $review['rating']; $s++)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-yellow-500">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.84-.197-1.54-1.118l1.07-3.292a1 1 0 00-.364-1.118L3.98 8.72c-.783-.57-.38-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-gray-700">{{ $review['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        var btn = document.getElementById('showTelBtn');
        var tel = document.getElementById('telNumber');
        if(btn && tel){
            btn.addEventListener('click', function(){
                tel.classList.remove('hidden');
                btn.classList.add('hidden');
            });
        }
    });
</script>
@endsection