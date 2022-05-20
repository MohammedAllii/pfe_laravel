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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('specialite')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->string('avatar')->nullable()->default('user.png');
            $table->string('avatar_couverture')->nullable()->default('couverture.png');
            $table->string('adresse')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('civilite')->nullable();
            $table->string('gouvernorat')->nullable();
            $table->text('resume_user')->nullable();
            $table->text('skills_user')->nullable();
            $table->text('interet_user')->nullable();
            $table->string('site_web')->nullable()->default('https://');
            $table->integer('phone')->nullable();
            $table->integer('annee_fondation')->nullable();
            $table->text('description_entreprise')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->integer('nb_employee')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
