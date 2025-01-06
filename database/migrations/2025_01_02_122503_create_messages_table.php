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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('chat_id'); // ID percakapan
            $table->unsignedBigInteger('sender_id'); // Pengirim pesan
            $table->text('content'); // Isi pesan
            $table->enum('message_type', ['text', 'image', 'video', 'file'])->default('text'); // Jenis pesan
            $table->timestamp('sent_at')->useCurrent(); // Waktu pengiriman
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraints
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('sender_id')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
