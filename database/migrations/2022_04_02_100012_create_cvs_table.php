<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->string('poste');
            $table->text('resume')->nullable();
            $table->text('interet')->nullable();
            $table->text('skills')->nullable();
            $table->string('localite');
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('etat')->nullable();
            $table->string('ville')->nullable();
            $table->string('nationalite')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('pdf')->nullable();
            $table->string('avatar_cv')->default('cv.png');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('cvs');
    }
}
