<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquipeEmployes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe_employes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreign('employe_id')->references('id')->on('employes');
            $table->foreign('equipe_id');
            $table->foreignId('role_id');
            $table->timestamps();
            $table->foreignId('user_id');
            $table->integer('statut');
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
