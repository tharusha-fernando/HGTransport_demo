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
        Schema::table('vehicles', function (Blueprint $table) {
            $table->string('path')->nullable();
            $table->date('fitness_testExp')->nullable();
            $table->date('emisions_testExp')->nullable();
            $table->date('anual_revLicExp')->nullable();
            $table->date('insuarance_Exp')->nullable();
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
            $table->dropColumn('path');
            $table->dropColumn('fitness_testExp');
            $table->dropColumn('emisions_testExp');
            $table->dropColumn('anual_revLicExp');
            $table->dropColumn('insuarance_Exp');
            //
        });
    }
};
