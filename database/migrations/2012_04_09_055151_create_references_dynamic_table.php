<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferencesDynamicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references_dynamic', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('reference_name');
            $table->string('reference_description')->nullable();
			$table->string('category');
			$table->string('table');
            $table->longText('section')->nullable();
			$table->boolean('is_active')->default('1');            
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
        Schema::dropIfExists('references_dynamic');
    }
}
