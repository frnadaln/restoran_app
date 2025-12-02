<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('mejas', function (Blueprint $table) {
            $table->integer('kapasitas')->after('nomor_meja');
            $table->integer('minimum_spent')->after('kapasitas');
        });
    }

    public function down()
    {
        Schema::table('mejas', function (Blueprint $table) {
            $table->dropColumn('kapasitas');
            $table->dropColumn('minimum_spent');
        });
    }
};
