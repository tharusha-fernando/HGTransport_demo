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
        Schema::create('prizings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('limit');
            $table->double('prizingprizeprizingprize');
            $table->longText('description')->nullable();//->default('fmnafmaklmasdmadmakabubububububabubabubububabuba');
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
        Schema::dropIfExists('prizings');
    }
};
