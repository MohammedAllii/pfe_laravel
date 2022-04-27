<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLettresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lettres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('poste')->nullable();
            $table->string('phone')->nullable();
            $table->text('contenu')->nullable();
            $table->string('pdf')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('lettres');
    }
}
