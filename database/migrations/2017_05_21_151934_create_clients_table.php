<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->text('options')->nullable()->default(null);
            $table->integer('user_id',false, true)->length(10);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable("configurations")){
            Schema::table("configurations",function($table){
                $table->dropForeign('configurations_client_id_foreign');
            });
        }
        Schema::dropIfExists('clients');
    }
}
