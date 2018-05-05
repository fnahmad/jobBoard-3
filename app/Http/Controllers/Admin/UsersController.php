<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$users = User::all();

		return view('admin.users')->with(['users' => $users]);
	}
}