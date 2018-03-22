<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('flight_name');          // Flight Name
            $table->integer('from_airport_id');     // From Airport ID
            $table->string('to_airport_id');        // To Airport ID
            $table->float('price');                 // Price in Float (CAD for now)
            $table->integer('operator_id');         // Operator ID
            $table->integer('class_type_id');       // Flight class type ID
            $table->dateTime('start_time');         // Start time of the flight
            $table->dateTime('end_time');           // End time of the flight
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
