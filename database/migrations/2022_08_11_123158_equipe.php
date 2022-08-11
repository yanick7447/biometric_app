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
    public function up()
    {
        Schema::create('equipe', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->id();
        $table->foreignId('etat_id');
        $table->text('objectif');
        $table->string('lieu_travail');
        $table->double('long');
        $table->double('lat');
        $table->date('debut');
        $table->date('fin');
        $table->integer('note');
        $table->text('remarque');
        $table->timestamps();
        $table->foreignId('user_id');
        $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
