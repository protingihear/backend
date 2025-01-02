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
        Schema::create('chats', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user1_id'); // ID pengguna pertama
            $table->unsignedBigInteger('user2_id'); // ID pengguna kedua
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraints
            $table->foreign('user1_id')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
            $table->foreign('user2_id')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');

            // Unique constraint to avoid duplicate chats
            $table->unique(['user1_id', 'user2_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
