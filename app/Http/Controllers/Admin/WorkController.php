<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Work;
use Illuminate\Http\Request;

class WorkController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.works');
	}
}