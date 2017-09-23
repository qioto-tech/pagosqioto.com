<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
	protected $fillable = ['commerce_id','customer_id','customer_name','customer_lastname','customer_phone','customer_address','customer_email','customer_language ','order_description','order_amount','order_id','response_url','state'];
	//
}
