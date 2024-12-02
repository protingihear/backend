<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosakataTable extends Migration
{
    public function up()
    {
        Schema::create('kosakata', function (Blueprint $table) {
        
            $table->id('idKata');
    $table->string('kata', 256);
    $table->string('artiKata', 256);
    $table->unsignedBigInteger('idAhliBahasa'); // Foreign Key
    $table->foreign('idAhliBahasa')->references('idAhliBahasa')->on('ahli_bahasa')->onDelete('cascade');
    $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kosakata');
    }
}
