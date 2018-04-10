<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_point', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code_id')->unsigned()->nullable();
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
            $table->integer('point_id')->unsigned()->nullable();
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
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
        Schema::dropIfExists('codes_points');
    }
}
