<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OfficersPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('officers_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('officer_id',false, true)->unsigned();
            $table->integer('town_id',false, true)->unsigned();
            $table->timestamps();

            $table->foreign('officer_id')->references('id')->on('officers');
            $table->foreign('town_id')->references('id')->on('towns');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telephones');
    }
}
