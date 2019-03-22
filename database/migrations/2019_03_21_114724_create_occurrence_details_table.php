<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccurrenceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrence_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('occurrence_id');
            $table->unsignedBigInteger('prociv_id');
            $table->integer('NumeroMeiosAereosEnvolvidos');
            $table->integer('NumeroMeiosTerrestresEnvolvidos');
            $table->integer('NumeroOperacionaisAereosEnvolvidos');
            $table->integer('NumeroOperacionaisTerrestresEnvolvidos');
            $table->unsignedInteger('state_id');
            $table->string('state');
            $table->dateTime('last_update')->nullable();
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
        Schema::dropIfExists('occurrence_details');
    }
}
