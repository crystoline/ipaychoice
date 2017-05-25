<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->string('primary_email',100)->unique();
            $table->string('primary_phone',15)->unique();
            $table->integer('town_id',false, true)->unsigned();

            $table->foreign('town_id')->references('id')->on('towns');

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
        Schema::dropIfExists('customers');
    }
}
