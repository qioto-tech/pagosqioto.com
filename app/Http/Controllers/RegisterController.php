<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

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
    	$register = Register::find(1);
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
    	
    	
    	$ysqsm = $this->actualizarysqsm($request->order_id,$request->order_status);
    	
    	if($request->authorization_result == '00' && $request->order_status == 'Autorizado'){
    		
    		
    		
    		$mce = $this->actualizarmce($request->order_id);
    		return Redirect::to('http://www.yosiquierosermaestro.com/aprobado/'.$request->order_id);
    		//return Redirect::to('http://yosiquierosermaestro.local/aprobado/'.$request->order_id);
    	} else {
    		return Redirect::to('http://www.yosiquierosermaestro.com/reprobado/'.$request->order_id);
    		//return Redirect::to('http://yosiquierosermaestro.local/reprobado/'.$request->order_id);
    	}    	
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
    
    private function actualizarysqsm ($orderId, $order_status)
    {
    	$order = DB::connection('yosiquierosermaestro')->update('update orders set state = ? where code = ?', [$order_status, $orderId]);
    	return $order;
    }
    
    function generateRandomString($length = 5) {
    	$characters = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    	$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
    		$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
    }
    
    private function actualizarmce ($orderId)
    {
    	$datas = DB::connection('yosiquierosermaestro')->select('select persons.*, orders.product_description from persons inner join orders on orders.customer_id = persons.id  where code = ?', [$orderId]);
    	
    	foreach ($datas as $data){
    		$usuario = 'Aspirante_'.$orderId;
    		
    		$passwNE=$this->generateRandomString();
    		$password=md5($passwNE);
    		$order = DB::connection('yosiquierosermaestro')->update('update orders set password_ne = ? where code = ?', [$passwNE, $orderId]);
    		
    		
    		$user =  DB::connection('mecapacitoecuador')->insert('insert into TB_USUARIOS(usu_usuario,usu_password,usu_nombre,usu_apellido,usu_mail,usu_perfil) value (?,?,?,?,?,?)',[$usuario,$password,$data->customer_name,$data->customer_lastname,$data->customer_email,'Estudiante']);
    	}
    	return $user;
    }
}
