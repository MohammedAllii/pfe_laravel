<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('url');
            $table->unsignedBigInteger('id_cv')->nullable();
            $table->foreign('id_cv')->references('id')->on('cvs')->onDelete('cascade');
            $table->unsignedBigInteger('id_user')->nullable();
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
        Schema::dropIfExists('liens');
    }
}
