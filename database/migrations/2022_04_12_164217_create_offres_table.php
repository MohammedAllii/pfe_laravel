<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('poste');
            $table->string('lieu_travail');
            $table->string('pays');
            $table->string('contrat');
            $table->string('temps_travail');
            $table->integer('salaire');
            $table->string('monnaie');
            $table->string('periode');
            $table->string('etat')->default(false);
            $table->text('description');
            $table->string('name_company');
            $table->string('site_web')->nullable();
            $table->string('annee')->nullable();
            $table->string('employes')->nullable();
            $table->text('description_company')->nullable();
            $table->text('question1')->nullable();
            $table->text('question2')->nullable();
            $table->text('question3')->nullable();
            $table->unsignedBigInteger('id_company');
            $table->foreign('id_company')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('offres');
    }
}
