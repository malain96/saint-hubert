<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('label',100)->unique();
            $table->integer('postal_code_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('cities', function (Blueprint $table)
        {
          $table->foreign('postal_code_id')->references('id')->on('postal_codes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
