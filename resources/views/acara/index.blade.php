@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8 px-4">
    <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">Explore Events</h1>

    <!-- Search Form -->
    <form action="{{ route('acara.index') }}" method="GET" class="mb-8 flex justify-center">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Cari event..." 
            class="w-1/2 p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button 
            type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition">
            Cari
        </button>
    </form>


        <br>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($events as $event)
        <div class="group bg-white text-gray-900 rounded-lg shadow-md overflow-hidden transition transform hover:scale-105 hover:shadow-lg">
            <div class="relative aspect-w-16 aspect-h-9">
                <img 
                    src="{{ asset('storage/' . $event->image) }}" 
                    alt="Poster {{ $event->title }}" 
                    class="w-full h-full object-contain object-center bg-gray-100">
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 to-transparent text-white p-3">
                    <h2 class="text-lg font-semibold truncate">{{ $event->title }}</h2>
                </div>
            </div>
            <div class="p-5">
                <a href="{{ route('acara.show', $event->id) }}" 
                   class="block text-center bg-blue-500 text-white font-medium py-2 px-4 rounded-md shadow hover:bg-blue-600 transition duration-200">
                   Lihat Detail Event
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-3">
            <div class="bg-gray-100 border-l-4 border-gray-500 text-gray-700 p-4 text-center rounded-lg shadow-md">
                <p class="font-bold text-lg">Tidak Ada Event</p>
                <p>Belum ada event yang tersedia saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
