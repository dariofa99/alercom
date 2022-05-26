<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions_contacts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('institution_contact');
            $table->bigInteger('contact_type_id')->unsigned();
            $table->foreign('contact_type_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade')->onUpdate('cascade');          
            $table->timestamps();
        });

        Schema::create('events_has_institutions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('verification_token')->nullable();
            $table->bigInteger('institution_id')->unsigned();
            $table->foreign('institution_id')->references('id')->on('institutions')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('references')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('institutions_contacts')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('institutions_contacts');
    }
}
