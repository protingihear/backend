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
        Schema::create('message_statuses', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('message_id'); // ID pesan
            $table->unsignedBigInteger('user_id'); // Penerima pesan
            $table->enum('status', ['sent', 'delivered', 'read'])->default('sent'); // Status pesan
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraints
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->foreign('user_id')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_statuses');
    }
};
