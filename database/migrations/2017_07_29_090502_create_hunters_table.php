<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunters', function (Blueprint $table)
        {
            $table->increments('id');
            $table->smallInteger('title_id')->unsigned();
            $table->string('lastName', 50);
            $table->string('firstName', 50);
            $table->integer('address_id')->unsigned();
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::table('hunters', function(Blueprint $table)
        {
          $table->foreign('title_id')->references('id')->on('title')->onDelete('cascade');
          $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hunters');
    }
}
