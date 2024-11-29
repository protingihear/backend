<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomunitasTable extends Migration
{
    public function up()
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id('idKomunitas');
            $table->string('namaKomunitas', 256);
            $table->foreignId('idTemanTuli')->constrained('teman_tuli')->onDelete('cascade');
            $table->foreignId('idTemanDengar')->constrained('teman_dengar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komunitas');
    }
}
