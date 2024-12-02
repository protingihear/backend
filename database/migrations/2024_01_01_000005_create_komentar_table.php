<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
          $table->id('idKomentar'); // Primary Key
    $table->string('isiKomentar', 255);
    $table->unsignedBigInteger('idKomunitas'); // Foreign Key
    $table->unsignedBigInteger('idTemanTuli'); // Foreign Key
    $table->unsignedBigInteger('idTemanDengar'); // Foreign Key
    $table->timestamps();

    $table->foreign('idKomunitas')->references('idKomunitas')->on('komunitas')->onDelete('cascade');
    $table->foreign('idTemanTuli')->references('idTemanTuli')->on('teman_tuli')->onDelete('cascade');
    $table->foreign('idTemanDengar')->references('idTemanDengar')->on('teman_dengar')->onDelete('cascade'); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
