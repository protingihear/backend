<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id('idKomentar');
            $table->string('isiKomentar', 255);
            $table->foreignId('idKomunitas')->constrained('komunitas')->onDelete('cascade');
            $table->foreignId('idTemanTuli')->constrained('teman_tuli')->onDelete('cascade');
            $table->foreignId('idTemanDengar')->constrained('teman_dengar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentar');
    }
}
