<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelephonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('telephones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('telephone',15);
            $table->string('user_type',100);
            $table->integer('user_id',false, true)->unsigned();
            $table->unique(['telephone', 'user_type','user_id']);
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
        Schema::dropIfExists('telephones');
    }
}
