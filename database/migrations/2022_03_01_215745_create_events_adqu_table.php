<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsAdquTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_adqu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('value');
            $table->string('value_is_other');
            $table->bigInteger('aditional_question_id')->unsigned();
            $table->foreign('aditional_question_id')->references('id')->on('aditional_questions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('events_id')->unsigned();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');          
            $table->bigInteger('question_option_id')->unsigned();
            $table->foreign('question_option_id')->references('id')->on('question_options')->onDelete('cascade')->onUpdate('cascade');
          

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
        Schema::dropIfExists('events_adqu');
    }
}
