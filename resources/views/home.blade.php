@extends('layouts.app')

@section('title', 'Home - SmeconeEvent')

@section('content')

<section class="hero bg-gray-50 py-32">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
        <div class="h-image mb-8 md:mb-0 md:w-1/2 flex justify-center">
            <img src="{{ asset('image/smk1.png') }}" 
                 alt="Smecone Event Logo" 
                 class="w-full max-w-sm object-contain">
        </div>
        <div class="h-text text-center md:text-left md:w-1/2">
            <h4 class="text-3xl font-bold text-gray-800">Smecone Event Management</h4>
            <h1 class="text-5xl font-extrabold text-gray-900 mt-4">Rencanakan Acaramu</h1>
            <p class="text-gray-600 mt-4">
                Life is like an event—well planned, well executed, and unforgettable.
            </p>
        </div>
    </div>
</section>

<br>

<!-- Highlights Events Section -->
<section class="events-list bg-white py-16">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Upcoming Events</h2>
        @if ($events->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                    <div class="bg-gradient-to-r from-blue-50 via-gray-100 to-gray-200 text-gray-800 rounded-lg shadow-lg overflow-hidden hover:scale-105 hover:shadow-2xl transition duration-300">
                        <div class="p-6">
                            <h5 class="text-xl font-semibold text-gray-900">{{ $event->title }}</h5>
                            <p class="text-gray-600 mt-2">{{ Str::limit($event->description, 100) }}</p>
                            <p class="text-gray-500 mt-2">Tanggal: {{ $event->start_date->format('d M Y') }}</p>
                            <a href="{{ route('acara.show', $event->id) }}" 
                               class="mt-4 block px-4 py-2 bg-orange-300 text-white font-medium rounded-md text-center hover:bg-orange-600 transition">
                               Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg">Belum ada event yang akan datang.</p>
        @endif
    </div>
</section>


@endsection
