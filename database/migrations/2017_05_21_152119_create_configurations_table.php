<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('subdomain',50)->unique();
            $table->string('domain',70)->unique();
            $table->string('database',50)->nullable()->default(null);
            $table->timestamp('subscription_start')->nullable()->default(null);
            $table->timestamp('subscription_end')->nullable()->default(null);
            $table->integer('renewal_period')->length(3)->unsigned()->nullable()->default(null);
            $table->integer('status')->unsigned()->length(1)->default(1);
            //$table->integer('package_id')->unsigned()->length(2);
            $table->integer('client_id', false,true);
            $table->timestamps();
           // $table->foreign('package_id')->references('id')->on('packages')->onDelete('restrict');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("configurations",function($table){
            $table->dropForeign('');
            //$table->dropForeign('configurations_package_id_foreign');
            $table->dropForeign('configurations_client_id_foreign');
        });
        Schema::dropIfExists('configurations');

    }
}
