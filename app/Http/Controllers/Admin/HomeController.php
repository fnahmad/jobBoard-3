<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Job;
use App\Skill;
use App\Work;
use Illuminate\Http\Request;

class HomeController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$jobs = Work::with('skills')->get();

		return view('admin.home')->with(['jobs' => $jobs]);
	}
}