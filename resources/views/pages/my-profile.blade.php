<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WardellTech</title>
    <link rel="icon" href="/img/headingW.png">
    <link rel="stylesheet" href="assets/css/services.css">
    @yield('css')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>


@include('layouts.partials.navbar')
<body>
<section class="container mx-auto px-4 py-6 mt-21" style="padding-top: 200px">
<!-- @dump($user, $services) -->
    <div class="container py-4">
        <div class="bg-white shadow rounded p-4">
            <div class="flex items-center gap-4">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover mx-5">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="Avatar" class="w-24 h-24 rounded-full">
                @endif

                <div class="mx-5">
                    <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                    <p class="text-muted">{{ $user->email }}</p>
                    <p class="text-muted">📱 {{ $user->phone_number }}</p>
                    @if(isset($user->about_me))
                        <p class="mt-2">{!! nl2br(e($user->about_me)) !!}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h3 class="text-xl font-semibold mb-5">Layanan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($services as $service)
                <a href="{{ url('services/' . $service->service_id) }}">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->overview . ' ' . $service->service_id }}" class="w-full max-h-40 object-cover rounded-lg">
                        <h2 class="text-xl font-bold mt-2">{{ \Illuminate\Support\Str::limit($service->overview, 25) }}</h2>
                        <div class="flex justify-between items-center mt-2">
                        <span class="text-yellow-500">
                            ⭐ {{ number_format($service->ordersWithReview->avg('rating'), 1) }} ({{ $service->ordersWithReview->count() }} reviews)
                        </span>

                            <h2 class="text-gray-700">Rp.{{ number_format($service->price) }}</h2>
                            
                        </div>
                        <span class="badge bg-secondary mt-2">{{$service->category}}</span>
                    </div>
                </a>
                @empty
                    <p>Freelancer ini belum memiliki layanan.</p>
                @endforelse
            </div>
        </div>
        <div class="mt-5">
            <h3 class="text-xl font-semibold mb-5">Portfolio Freelancer</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($portfolios as $portfolio)
                <a href="{{ url('portfolio/' . $portfolio->id) }}">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title. ' ' . $portfolio->id }}" class="w-full max-h-40 object-cover rounded-lg">
                        <h2 class="text-xl font-bold mt-2">{{ \Illuminate\Support\Str::limit($portfolio->title, 25) }}</h2>
                        <div class="flex justify-between items-center mt-2">
                            <h2 class="text-gray-700">{{ \Illuminate\Support\Str::limit($portfolio->description, 25) }}</h2>
                        </div>
                        <span class="badge bg-secondary mt-2">{{$portfolio->category}}</span>
                    </div>
                </a>
                @empty
                    <p>Freelancer ini belum memiliki portfolio.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>


@include('layouts.partials.footer')
</body>
