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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->id();
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('matricule',100)->unique();
            $table->string('surname');
            $table->date('dob');
            $table->string('sexe');
            $table->text('empreinte1');
            $table->text('empreinte2');
            $table->text('empreinte3');
            $table->string('avatar');
            $table->text('phone1');
            $table->text('phone2');
            $table->unsignedBigInteger('cni');
            $table->string('quartier');
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
        Schema::dropIfExists('users');
    }
}
