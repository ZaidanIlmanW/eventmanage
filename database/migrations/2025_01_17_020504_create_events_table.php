<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul acara
            $table->text('description')->nullable(); // Deskripsi acara
            $table->dateTime('start_date')->nullable(); // Tanggal mulai
            $table->dateTime('end_date')->nullable(); // Tanggal berakhir
            $table->string('location'); // Lokasi acara
            $table->string('image')->nullable(); // Gambar acara
            $table->enum('status', ['published', 'draft', 'cancelled'])->default('draft'); // Status acara

    // Foreign key untuk kategori acara
            $table->foreignId('event_category_id')->nullable()
            ->constrained('event_categories') // Hubungkan dengan tabel `event_categories`
            ->nullOnDelete(); // Null jika kategori dihapus

    // Foreign key untuk pembicara acara
            $table->foreignId('event_speaker_id')->nullable()
            ->constrained('event_speakers') // Hubungkan dengan tabel `event_speakers`
            ->nullOnDelete(); // Null jika pembicara dihapus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
