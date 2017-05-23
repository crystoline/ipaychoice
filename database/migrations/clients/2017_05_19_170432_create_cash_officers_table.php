<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('officers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->unique();
            $table->string('password',60);

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
        Schema::dropIfExists('officers');
    }
}
