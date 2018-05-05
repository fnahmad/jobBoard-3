<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Work;
use Illuminate\Http\Request;

class OffersController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$jobs = Work::with('skills')->get();

		return view('admin.offers')->with(['jobs' => $jobs]);
	}
}