<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->foreignId('departure_city_id')->references('id')->on('cities')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('arrival_city_id')->references('id')->on('cities')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamp('departure_time');
            $table->string('trip_duration',30);
			$table->timestamp('real_arrival_time')->nullable();
			$table->longText('novelty')->nullable();
            $table->foreignId('vehicle_id')->references('id')->on('vehicles')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
