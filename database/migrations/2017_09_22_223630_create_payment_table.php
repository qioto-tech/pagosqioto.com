<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('payments', function ( $table ) {
    		$table->increments('id');
    		$table->string('commerce_id',11);
    		$table->string('customer_id');
    		$table->string('customer_name');
    		$table->string('customer_lastname');
    		$table->string('customer_phone');
    		$table->string('customer_address');
    		$table->string('customer_email');
    		$table->string('customer_language');
    		$table->string('order_description');
    		$table->string('order_amount');
    		$table->string('order_id');
    		$table->string('response_url');
    		$table->string('state',5);
    		$table->timestamps();
    	});//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('payments');//
    }
}
