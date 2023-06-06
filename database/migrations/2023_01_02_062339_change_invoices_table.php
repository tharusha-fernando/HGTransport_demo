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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoice_number')->change()->nullable();
            $table->unsignedBigInteger('company_id')->change()->nullable();
            $table->bigInteger('total')->change()->nullable();
            $table->bigInteger('paid')->change()->nullable();
            $table->bigInteger('unpaid')->change()->nullable();

            //
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('invoice_number')->change()->nullable(false);
            $table->unsignedBigInteger('company_id')->change()->nullable(false);
            $table->bigInteger('total')->change()->nullable(false);
            $table->bigInteger('paid')->change()->nullable(false);
            $table->bigInteger('unpaid')->change()->nullable(false);

            //
        });
        //
    }
};
