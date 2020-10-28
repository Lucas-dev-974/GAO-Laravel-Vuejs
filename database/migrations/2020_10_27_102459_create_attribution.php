<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttribution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribution', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('horaire');
            $table->unsignedBigInteger('id_ordinateur');
            $table->foreign('id_ordinateur')->references('id')->on('ordinateur');
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('client');

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
        Schema::dropIfExists('attribution');
    }
}
