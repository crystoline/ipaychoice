<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('towns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('state_id',false, true)->unsigned();
            $table->timestamps();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towns');
    }
}
