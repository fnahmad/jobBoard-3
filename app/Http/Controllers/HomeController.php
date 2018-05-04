<?php

namespace App\Http\Controllers;

use App\Job;
use App\Skill;
use App\Work;
use Illuminate\Http\Request;

class HomeController extends Controller{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$jobs = Work::with('skills')->get();

		return view('home')->with(['jobs' => $jobs]);
	}
}