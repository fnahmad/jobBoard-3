<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\User;
use App\Work;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		// Get new offers of the day
		$offersThisDay = Work::where('created_at', '>', Carbon::now()->startOfDay())
													->where('created_at', '<', Carbon::now())
													->count();

		// Get new offers of the week
		$offersThisWeek = Work::where('created_at', '>', Carbon::now()->startOfWeek())
													->where('created_at', '<', Carbon::now())
													->count();

		// Get Total users
		$totalUsers = User::where('is_confirmed', 1)->count();

		$stats = [
			'offersThisDay' => $offersThisDay,
			'offersThisWeek' => $offersThisWeek,
			'totalUsers' => $totalUsers,
		];

		dd($stats);

		return view('admin.home')->with(['stats' => $stats]);
	}
}