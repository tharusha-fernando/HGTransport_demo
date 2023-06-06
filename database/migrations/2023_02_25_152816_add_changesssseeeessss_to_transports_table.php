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
        Schema::table('transports', function (Blueprint $table) {
            $table->string('destination_return_from')->change()->nullable();
            $table->string('destination_return_to')->change()->nullable();
            $table->double('start_meter')->change()->nullable();
            $table->double('end_meter')->change()->nullable();
            $table->double('total_km')->change()->nullable();
            $table->double('end_meter')->change()->nullable();

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
        Schema::table('transports', function (Blueprint $table) {
            $table->string('destination_return_from')->change()->nullable(false);
            $table->string('destination_return_to')->change()->nullable(false);
            $table->double('start_meter')->change()->nullable(false);
            $table->double('end_meter')->change()->nullable(false);
            $table->double('total_km')->change()->nullable(false);
            //
        });
    }
};
