<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EquipeEmploye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('equipe_employes', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('employe_id')->nullable();
            $table->foreignId('equipe_id')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->integer('statut');
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
    { Schema::dropIfExists('equipe_employes'); }
}
