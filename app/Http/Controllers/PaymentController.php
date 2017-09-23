<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
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
		
		return ['todos' => Payment::all()];
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
		$payment = new Payment();
		$payment->fill($request->all());
		$payment->save();
		
		return ['created' => true];
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Register  $register
	 * @return \Illuminate\Http\Response
	 */
	public function show(Payment $payment)
	{
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Register  $register
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Payment $payment)
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
	public function update(Request $request, Payment $payment)
	{
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Register  $register
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Payment $payment)
	{
		//
		
	}
}
