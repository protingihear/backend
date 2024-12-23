<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('teman_tuli', function (Blueprint $table) {
        if (!Schema::hasColumn('teman_tuli', 'gender')) {
            $table->enum('gender', ['L', 'P'])->comment('L: Laki, P: Perempuan')->after('picture');
        }
    });
}

public function down()
{
    Schema::table('teman_tuli', function (Blueprint $table) {
        $table->dropColumn('gender');
    });
}

};
