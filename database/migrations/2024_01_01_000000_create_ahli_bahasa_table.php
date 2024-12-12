<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAhliBahasaTable extends Migration
{
    public function up()
    {
        Schema::create('ahli_bahasa', function (Blueprint $table) {
            $table->id('idAhliBahasa');
            $table->string('firstName', 256);
            $table->string('lastName', 256);
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('picture', 512)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ahli_bahasa');
    }
}
