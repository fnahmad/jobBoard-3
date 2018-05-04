<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller{

	/**
	 * Handle a registration request for the application.
	 *
	 * @param $token
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function verify($token) {
		$user              = User::where('email_token', $token)->first();
		$user->is_confirmed = 1;
		if($user->save()) {
			return view('auth.emailconfirm', ['user' => $user]);
		}
	}
}
