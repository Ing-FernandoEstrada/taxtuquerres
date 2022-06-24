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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('model');
            $table->string('plate');
            $table->string('quota');
            $table->string('image_path', 2048)->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('brand_id')->references('id')->on('brands')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
