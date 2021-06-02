<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
class Forgot extends Controller
{

	public function forgot() {
		$credentials = request()->validate(['email' => 'required|email']);
		$data = DB::table('users')->where('email', request()->email)->first();
		if ($data === NULL) {
			return response()->json(["msg" => 'Tidak dapat menemukan email anda di database.']);
		}else{
			Password::sendResetLink($credentials);

			return response()->json(["msg" => 'Reset password sudah dikirim.']);
		}
		
	}
}
