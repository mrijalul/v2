<?php

namespace App\Http\Middleware;

use Closure;

class isBagPemeriksaan
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(auth()->check() && auth()->user()->is_bagpemeriksa == 1){
			return $next($request);
		}
		return redirect('home')->with('error',"You don't have admin access.");
	}
}
