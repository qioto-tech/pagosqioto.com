<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('registers', function ( $table ) {
    		$table->increments('id');
    		$table->string('authorization_result',11);
    		$table->string('customer_id');
    		$table->string('order_id');
    		$table->string('order_status');
    		$table->string('purchase_operation_number');
    		$table->string('card_brand');
    		$table->string('card_number');
    		$table->string('card_type');
    		$table->timestamps();
    	});//
    	//
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
