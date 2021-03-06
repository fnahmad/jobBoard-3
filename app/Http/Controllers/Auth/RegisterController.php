<?php

namespace App\Http\Controllers\Auth;

use App\Mail\EmailVerification;
use App\Notifications\AdminUserRegistered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Notification;

class RegisterController extends Controller{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'firstname' => 'required|string|max:255',
			'lastname'  => 'required|string|max:255',
			'email'     => 'required|unique:users|regex:/([a-z\-]+).([a-z\-]+)@hetic.net/i',
			'promo'     => 'string|max:4',
			'phone'     => 'nullable|string|max:255',
			'password'  => 'required|string|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 *
	 * @return \App\User
	 */
	protected function create(array $data) {
		return User::create([
			'firstname'   => $data['firstname'],
			'lastname'    => $data['lastname'],
			'email'       => $data['email'],
			'promo'       => $data['promo'],
			'phone'       => $data['phone'],
			'password'    => Hash::make($data['password']),
			'email_token' => base64_encode($data['email']),
		]);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request) {
		$this->validator($request->all())->validate();
		$user = $this->create($request->all());
		Mail::to($user->email)->send(new EmailVerification($user));
		// Notification des admins
		Notification::send($user, new AdminUserRegistered($user));

		return view('auth.verification');
	}


}
