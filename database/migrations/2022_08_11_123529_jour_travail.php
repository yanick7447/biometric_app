<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JourTravail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('jour_travails', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('equipe_id')->nullable();
            $table->foreignId('etat_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->text('objectif')->nullable();
            $table->text('lieu');
            $table->datetime('debut');
            $table->datetime('fin')->nullable();
            $table->text('rapport');
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
            $table->double('long1')->nullable();
            $table->double('lat1')->nullable();
            $table->double('long2')->nullable();
            $table->double('lat2')->nullable();
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    { Schema::dropIfExists('jour_travails'); }
}
