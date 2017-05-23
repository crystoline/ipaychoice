<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100);

            $table->string('user_type',100);
            $table->integer('user_id',false, true)->unsigned();
            $table->unique(['email', 'user_type','user_id']);
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
        Schema::dropIfExists('emails');
    }
}
