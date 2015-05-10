<?php namespace App\Http\Middleware;

use Redirect;
use Auth;
use Closure;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!Auth::check()) {
			return Redirect::route('login');
		} else {
			if (!Auth::user()->is_admin) {
				session()->flash('message_warning', '您不是管理员！无法进入相关区域');
				return Redirect::route('stu_home');
			}
		}
		return $next($request);
	}

}
