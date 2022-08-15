<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypePointage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('type_pointages', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nom');
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    { Schema::dropIfExists('type_pointages'); }
}
