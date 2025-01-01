<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //1. tambah tabel image disini
    public function up(): void
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('source')->nullable();
            $table->date('upload_date')->nullable();
            $table->time('upload_time')->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable(); // Kolom untuk menyimpan nama atau path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information');
    }
};
