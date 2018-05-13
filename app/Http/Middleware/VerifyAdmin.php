<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class VerifyAdmin{
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
			if( ! $user->is_admin) {
				Session::flash('message', __('errors.is_not_admin'));
				Session::flash('alert-class', 'error');

				return redirect('/');
			}
			$user->save();
		}

		return $next($request);
	}
}
