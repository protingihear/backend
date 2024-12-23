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
        Schema::create('postingan_relations', function (Blueprint $table) {
            $table->id();
            $table->text('kontenPostingan'); // Konten postingan
            $table->integer('likes')->default(0); // Jumlah suka
            $table->integer('comments')->default(0); // Jumlah komentar
            $table->string('image')->nullable(); // Gambar dalam postingan
            $table->string('username'); // Nama pengguna dari tabel teman_tuli
            // $table->unsignedBigInteger('dari_idTemanTuli'); // Foreign key ke tabel teman_tuli
            // $table->unsignedBigInteger('dari_idTemanDengar'); // Foreign key ke tabel teman_dengar
            $table->timestamps();
            $table->softDeletes();
        
            // Definisi foreign key
            // $table->foreign('username')
            //       ->references('username') // Pastikan kolom id pada teman_tuli ada
            //       ->on('teman_tuli')
            //       ->onDelete('cascade');
        
            // $table->foreign('dari_idTemanDengar')
            //       ->references('idTemanDengar') // Pastikan kolom id pada teman_dengar ada
            //       ->on('teman_dengar')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postingan_relations');
    }
};
