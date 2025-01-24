@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8 px-4">
    <!-- Card Event -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden lg:grid lg:grid-cols-2 lg:gap-8">
        <!-- Event Image -->
        <div class="w-full h-80 lg:h-auto">
            <img 
                src="{{ asset('storage/' . $events->image) }}" 
                alt="Poster {{ $events->title }}" 
                class="w-full h-full object-cover object-center">
        </div>

        <!-- Event Details -->
        <div class="p-6">
            <!-- Title -->
            <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-4">{{ $events->title }}</h1>

            <!-- Date -->
            <p>Mulai: {{ $events->start_date->format('d M Y, H:i') }}</p>
            <p>Selesai: {{ $events->end_date->format('d M Y, H:i') }}</p>

            <!-- Description -->
            <p class="text-gray-700 mt-4 text-base leading-relaxed mb-6">
                <strong class="text-lg font-semibold text-gray-800">Deskripsi:</strong>
                <br>
                {{ $events->description }}
            </p>
            
            <!-- Location -->
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Lokasi:</h3>
                <p class="text-gray-600 text-lg">{{ $events->location }}</p>
            </div>
            
            <!-- Category -->
           <!-- Category -->
             <div class="mt-6">
                 <h3 class="text-xl font-semibold text-gray-800 mb-2">Kategori:</h3>
                 @if($events->category)
                     <p class="text-gray-600 text-lg">{{ $events->category->nama }}</p>
                 @else
                     <p class="text-gray-600 text-lg">Kategori tidak tersedia</p>
                 @endif
             </div>
            

            <!-- Speaker -->
            @if (!empty($events->speaker))
            <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pembicara:</h3>
                <p class="text-gray-600 text-lg">{{ $events->speaker->nama }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection