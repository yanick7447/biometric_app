<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create('employes', static function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('poste_id')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->foreignId('admin_id')->nullable();
            $table->date('debut');
            $table->date('fin')->nullable();
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
    { Schema::dropIfExists('employes'); }
}
