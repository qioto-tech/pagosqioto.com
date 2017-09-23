<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = 'registers';
	protected $fillable = ['authorization_result','customer_id','order_id','order_status','purchase_operation_number','card_brand','card_number','card_type'];
	//
}
