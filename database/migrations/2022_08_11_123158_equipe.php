<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('equipes', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('etat_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->text('objectif')->nullable();
            $table->string('lieu_travail');
            $table->double('long');
            $table->double('lat');
            $table->date('debut');
            $table->date('fin')->nullable();
            $table->integer('note')->nullable();
            $table->text('remarque')->nullable();
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
    { Schema::dropIfExists('equipes'); }
}
