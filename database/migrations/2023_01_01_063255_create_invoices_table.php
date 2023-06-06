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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id()->startingValue(15000);//gfg//ffg//fgf//fg
            $table->string('invoice_number');
            $table->unsignedBigInteger('company_id');
            $table->bigInteger('total');
            $table->bigInteger('paid');
            $table->bigInteger('unpaid');
            $table->string('section');
            $table->date('date');
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('users');
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
        Schema::dropIfExists('invoices');
    }
};
