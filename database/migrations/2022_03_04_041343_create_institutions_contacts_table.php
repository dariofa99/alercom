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
