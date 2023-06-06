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
            $table->string('created_by')->default("default_user");
            $table->longText('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            //
        });
        Schema::table('transports', function (Blueprint $table) {
            $table->string('created_by')->default("default_user");
            $table->longText('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
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
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('deleted_by');
            //
        });
        Schema::table('transports', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('deleted_by');
            //
        });
    }
};
