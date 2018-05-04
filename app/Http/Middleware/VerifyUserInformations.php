<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class VerifyUserInformations{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		$user = Auth::user();
		if($user) {
			if( ! $user->is_confirmed) {
				Session::flash('message', __('errors.is_not_confirmed'));
				Session::flash('alert-class', 'error');

				return redirect('/');
			}
			$user->save();
		}

		return $next($request);
	}
}
