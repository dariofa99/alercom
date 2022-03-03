<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAditionalQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aditional_questions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('question_name');
            $table->string('section')->nullable();
            $table->string('table')->nullable();
            $table->boolean('is_active')->default(1);
            $table->bigInteger('type_question_id')->unsigned();
            $table->foreign('type_question_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('aditional_question');
    }
}
