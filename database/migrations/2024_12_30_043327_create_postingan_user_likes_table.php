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
        Schema::create('postingan_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ttl_id');
            $table->unsignedBigInteger('postingan_id');
            $table->timestamps();
        
            $table->foreign('ttl_id')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
            $table->foreign('postingan_id')->references('id')->on('postingan_relations')->onDelete('cascade');
            $table->unique(['ttl_id', 'postingan_id']); // Pastikan kombinasi unik
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingan_user_likes');
    }
};
