<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_client')->create('invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->float('amount');
            $table->integer('quantity');
            $table->integer('service_id',false, true)->unsigned();
            $table->integer('invoice_id',false, true)->unsigned();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('invoice_id')->references('id')->on('invoices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
}
