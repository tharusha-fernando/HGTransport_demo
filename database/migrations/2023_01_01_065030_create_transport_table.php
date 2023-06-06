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
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('transport_type');
            $table->integer('size');
            $table->date('date');
            $table->string('destination_from');
            $table->string('destination_to');
            $table->date('in_date');
            $table->time('in_time');
            $table->date('out_date');
            $table->time('out_time');
            $table->string('destination_return_from');
            $table->string('destination_return_to');
            $table->string('referrence_number');
            $table->float('transport_amount');
            $table->float('start_meter');
            $table->float('end_meter');
            $table->float('total_km');
            $table->float('transport_amount_return');
            $table->float('total_hrs');
            $table->float('free_hrs');
            $table->float('demurrage_hrs');
            $table->float('demurrage_amount');
            $table->float('highway');
            $table->float('bor');
            $table->float('con_hiring');
            $table->float('unloadings');
            $table->float('ticket');
            $table->float('loadings');
            $table->float('warehouse');
            $table->float('labour');
            $table->mediumText('gate_pass');
            $table->string('red__copyReferrenceNumber');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('invoice_id')->references('id')->on('invoices');
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
        Schema::dropIfExists('transport');
    }
};
