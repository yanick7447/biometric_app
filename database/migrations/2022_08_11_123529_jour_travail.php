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
    public function up()
    {
        Schema::create('jour_travail', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('equipe_id');
            $table->foreignId('etat_id');
            $table->text('objectif');
            $table->text('lieu');
            $table->datetime('debut');
            $table->datetime('fin');
            $table->text('rapport');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->double('long1');
            $table->double('lat1');
            $table->double('long2');
            $table->double('lat2');
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
