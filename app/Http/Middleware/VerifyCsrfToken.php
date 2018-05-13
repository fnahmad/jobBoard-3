<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Session\TokenMismatchException;

class VerifyCsrfToken extends Middleware{
	protected $except_urls = [
		'logout',
	];

	public function handle($request, \Closure $next) {
		$regex = '#' . implode('|', $this->except_urls) . '#';

		if($this->isReading($request) || $this->tokensMatch($request) || preg_match($regex, $request->path())) {
			return $this->addCookieToResponse($request, $next($request));
		}

		throw new TokenMismatchException();
	}
}
