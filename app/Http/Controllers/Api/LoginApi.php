<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;


class LoginApi extends Controller
{

	public function login(Request $request)
	{
		$credentials = $request->only('email', 'password', 'imei');
		if (Auth::attempt($credentials)) {
			$data = DB::table('users')
			->where('email' ,'=' , $credentials)
			->get();
			return response()->json([
				'username' => $data,
				'status_code'   => 200,
				'msg'           => 'success',
			], 200);
		}else{
			return response()->json([
				'username' => 'data tidak ditemukan',
				'status_code'   => 404,
				'msg'           => 'not found',
			], 404);
		}
	}
	public function register(Request $request){
	    $data2 = DB::table('users')->where('email', $request->email)->first();
	    if($data2 == TRUE){
	       return response()->json([
			'register' => 'Data sudah ada su',
			'status_code'   => 200,
			'msg'           => 'Berhasil Registrasi',
		], 201);
	    }elseif($data2 == FALSE){
	        
    	    $data = new User;
    		$data->name = $request->name;
    		$data->email = $request->email;	
    		$data->notelp = $request->notelp;
    		$data->imei = $request->imei;
    		$data->password = Hash::make($request->password);
    		$data->id_data = bin2hex(random_bytes(20));
    		$data->save();
    		if($data->imei == $request->imei){
        		DB::table('role_pay')
                ->insert([
                    'user_id'  =>  $data['id']
                ]);
        		 return response()->json([
        			'register' => $data,
        			'status_code'   => 200,
        			'msg'           => 'Berhasil Registrasi',
        		], 201);
    		}elseif($data->imei != $request->imei){
    		    	DB::table('role_pay')
                ->insert([
                    'user_id'  =>  $data['id'],
                ]);
        		 return response()->json([
        			'register' => $data,
        			'status_code'   => 200,
        			'msg'           => 'Berhasil Registrasi',
        		], 201);
    		}
	    }
	
	}
	
}
