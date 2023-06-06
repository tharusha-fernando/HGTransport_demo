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
        Schema::create('vehicle__owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->bigInteger('nic');
            $table->string('contact');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('vehicle__owners')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropForeign(['owner_id']);
            $table->dropColumn('owner_id');
            //
        });
        Schema::dropIfExists('vehicle__owners');

    }
};
