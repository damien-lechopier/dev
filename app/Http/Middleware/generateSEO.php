<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use LaravelLocalization;
use SEO;

class generateSEO
{


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle( $request, Closure $next )
	{

		SEO::setCanonical(LaravelLocalization::getLocalizedURL());

		return $next($request);
	}
}