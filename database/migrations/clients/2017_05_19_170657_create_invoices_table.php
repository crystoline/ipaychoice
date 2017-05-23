<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_no',100);
            $table->decimal('amount',20,5);
            $table->integer('status');
            $table->string('template', 100)->default('default');
            $table->integer('customer_id',false, true)->unsigned();
            $table->integer('officer_id',false, true)->unsigned();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('officer_id')->references('id')->on('officers');
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
        Schema::dropIfExists('invoices');
    }
}
