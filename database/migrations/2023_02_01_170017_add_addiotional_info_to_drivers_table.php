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
        Schema::table('drivers', function (Blueprint $table) {
            //license_expirationLicense_expiration
            $table->date('license_expirationLicense_expiration1')->nullable();//hijiiji
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
        Schema::table('drivers', function (Blueprint $table) {
            //license_expirationLicense_expiration
            $table->dropColumn('license_expirationLicense_expiration1');
            //
        });
    }
};
