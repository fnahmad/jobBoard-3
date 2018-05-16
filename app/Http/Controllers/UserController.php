<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

	public function index() {

		$user = Auth::user();

		return view('user.index')->with(['user' => $user]);

	}

	public function update(Request $request) {

		$user = Auth::user();

		$this->validate($request, [
			'firstname' => 'required|string|max:255',
			'lastname'  => 'required|string|max:255',
			'promo'     => 'string|max:4',
			'phone'     => 'nullable|string|max:255'
		]);
		$data = $request->all();
		$user->fill($data);
		$user->save();

		\Session::flash('message', 'Mis à jour');
		\Session::flash('alert-class', 'success');

		return back();

	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param $token
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function verify($token) {
		$user               = User::where('email_token', $token)->first();
		$user->is_confirmed = 1;
		if($user->save()) {
			return view('auth.emailconfirm', ['user' => $user]);
		}
	}
}
