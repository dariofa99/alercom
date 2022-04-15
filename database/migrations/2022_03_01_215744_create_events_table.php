<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('event_description')->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_place')->nullable();
            $table->string('latitude')->default("0.0");
            $table->string('longitude')->default("0.0");
            $table->string('event_aditional_information')->nullable();
            $table->boolean('affected_people')->default(0);
            $table->boolean('affected_family')->default(0);
            $table->boolean('affected_animals')->default(0);
            $table->boolean('affected_infrastructure')->default(0);
            $table->boolean('affected_livelihoods')->default(0);
            $table->bigInteger('event_type_id')->unsigned();
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('town_id')->unsigned();
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('cascade')->onUpdate('cascade');           
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('afectations_range_id')->unsigned();
            $table->foreign('afectations_range_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');           
            $table->timestamps();
        });

        Schema::create('events_has_institutions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');
        
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
        Schema::dropIfExists('events');
    }
}
