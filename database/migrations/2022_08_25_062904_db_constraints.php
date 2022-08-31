<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DbConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('employes', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('admin_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('poste_id')->references('id')->on('postes')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('roles')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        Schema::table('equipes', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('etat_id')->references('id')->on('etats')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        Schema::table('equipe_employes', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('employe_id')->references('id')->on('employes')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('equipe_id')->references('id')->on('equipes')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('role_id')->references('id')->on('roles')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        Schema::table('jour_travails', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('etat_id')->references('id')->on('etats')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('equipe_id')->references('id')->on('equipes')
                ->nullOnDelete()->cascadeOnUpdate();
        });

        Schema::table('pointages', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('employe_id')->references('id')->on('employes')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('equipe_id')->references('id')->on('equipes')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('jour_travail_id')->references('id')->on('jour_travails')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('type_id')->references('id')->on('type_pointages')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }
}
