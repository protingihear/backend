<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomunitasTable extends Migration
{
    public function up()
    {
        Schema::create('komunitas', function (Blueprint $table) {
            $table->id('idKomunitas'); // Primary Key
    $table->string('namaKomunitas', 256);
    $table->unsignedBigInteger('idTemanTuli'); // Foreign Key
    $table->unsignedBigInteger('idTemanDengar'); // Foreign Key
    $table->timestamps();

    $table->foreign('idTemanTuli')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
    $table->foreign('idTemanDengar')->references('idTemanDengar')->on('teman_dengar')->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('komunitas');
    }
}
