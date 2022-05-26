<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('institution_name');
            $table->string('institution_address');
            $table->string('institution_phone');
            $table->bigInteger('town_id')->unsigned();
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');           
           
            $table->timestamps();
        });

        Schema::create('institutions_has_event_types', function (Blueprint $table) {   
            $table->engine = 'InnoDB';         
            $table->id();
            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('event_type_id')->unsigned();
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('institutions');
    }
}
