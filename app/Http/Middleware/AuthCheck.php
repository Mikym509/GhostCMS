<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('LoggedUser') && ($request->path() != 'auth/Login' && $request->path() != 'auth/Register')){
            return redirect('/')->with('Fail','You must be logged in to view this page');
        }

        if (session()->has('LoggedUser') && ($request->path() == 'auth/Login' or $request->path() == 'auth/Register')){
            return back();
        }
        return $next($request)->header('Cache-control','no-cache,no-store,max-age=0,must-revalidate')
                              ->header('Pragma', 'no-cache')
                              ->header('Expires','Sat, 01 Jan 1970 00:00:00 GMT');
    }
}
