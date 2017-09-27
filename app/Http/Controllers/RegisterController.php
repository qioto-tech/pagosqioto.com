<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    	
    	$register = new Register();
    	
    	$register->fill($request->all());
    	$register->save();
    	
    	$ysqsm = $this->actualizarysqsm($request->order_id);
 //   	$mce = $this->actualizarmce($request->order_id);
    	
    	dd($ysqsm);
    	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
    
    private function actualizarysqsm ($orderId)
    {
    	$order = DB::connection('yosiquierosermaestro')->update('update orders set state = "APROVADO" where code = ?', [$orderId]);
    	return $order;
    }
    
    private function actualizarmce ($orderId)
    {
    	$datas = DB::connection('yosiquierosermaestro')->select('select persons.*, orders.product_description from persons inner join orders on orders.customer_id = persons.id  where code = ?', [$orderId]);
    	
    	foreach ($datas as $data){
    		$user =  DB::connection('mecapacitoecuador')->insert('',[$data->customer_ci,$pwd,$data->customer_name,$data->customer_lastname,$data->customer_email,'1']);
    	}
    	return $user;
    }
}
