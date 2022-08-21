<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ((auth()->user()->is_admin == 1) && (auth()->user()->user_type == 1)) {
            // $avatar = UserDetails::select('avatar')->where('userId', auth()->user()->id)->first();
            // if ($avatar) {
            //     View::share('avatar', $avatar->avatar);
            // }
            return $next($request);
        }
        // return abort(404);
        return response()->view("website.pages.access_denied");
    }
}
