<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('value');
            $table->boolean('is_active');
            $table->string('active_other_input');
            $table->bigInteger('aditional_question_id')->unsigned();
            $table->foreign('aditional_question_id')->references('id')->on('aditional_questions')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('question_options');
    }
}
