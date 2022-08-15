<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('users', static function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->string('nom');
            $table->string('email', 100)->unique();
            $table->unsignedBigInteger('cni')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('matricule',100)->unique();
            $table->string('prenom');
            $table->date('ddn')->nullable();
            $table->string('sexe')->nullable();
            $table->text('empreinte1')->nullable();
            $table->text('empreinte2')->nullable();
            $table->text('empreinte3')->nullable();
            $table->string('avatar')->nullable();
            $table->text('tel1')->nullable();
            $table->text('tel2')->nullable();
            $table->string('quartier')->nullable();
            $table->rememberToken();
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
    { Schema::dropIfExists('users'); }
}
