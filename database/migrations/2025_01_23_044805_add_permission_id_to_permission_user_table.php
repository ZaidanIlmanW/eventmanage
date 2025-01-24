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
        Schema::table('permission_user', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id')->after('id'); // Menambahkan kolom permission_id
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade'); // Menetapkan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permission_user', function (Blueprint $table) {
            $table->dropColumn('permission_id');
        });
    }
};
