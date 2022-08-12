<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pointage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('pointages', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('equipe_id')->nullable();
            $table->foreignId('employe_id')->nullable();
            $table->foreignId('jour_travail_id')->nullable();
            $table->foreignId('type_id')->nullable();
            $table->datetime('date_pointage')->nullable();
            $table->double('long');
            $table->double('lat');
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
    { Schema::dropIfExists('pointages'); }
}
