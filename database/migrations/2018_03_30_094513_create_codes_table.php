<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('code');
            $table->timestamps();
            $table->text('question_prename')->nullable();
            $table->text('question_name')->nullable();
            $table->text('question_gender')->nullable();
            $table->text('question_alone')->nullable();
            $table->text('question_event')->nullable();
            $table->text('question_event_rating')->nullable();
            $table->text('question_loved_station')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
}
