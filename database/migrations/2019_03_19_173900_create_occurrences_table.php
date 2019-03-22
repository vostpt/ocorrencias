<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccurrencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurrences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('prociv_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('county_id');
            $table->unsignedInteger('parish_id');
            $table->string('locality');
            $table->dateTime('started_at')->nullable();
            $table->float('lat', 10, 8);
            $table->float('lon', 10, 8);
            $table->unsignedInteger('type_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occurrences');
    }
}
