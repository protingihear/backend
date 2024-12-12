<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemanTuliTable extends Migration
{
    public function up()
    {
        Schema::create('teman_tuli', function (Blueprint $table) {
            $table->id('idTemanTuli');
            $table->string('email', 255)->unique();
            $table->string('firstName', 256);
            $table->string('lastName', 256);
            $table->string('username', 255)->unique();
            $table->string('password', 255);
            $table->string('bio', 255)->nullable();
             $table->string('picture', 512)->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teman_tuli');
    }
}
