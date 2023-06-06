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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->bigInteger('nic');
            $table->string('contact');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number');
            $table->string('vehicle_model');
            $table->integer('size');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->softDeletes();
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
        Schema::dropIfExists('drivers');
        Schema::dropIfExists('vehicles');
    }
};
