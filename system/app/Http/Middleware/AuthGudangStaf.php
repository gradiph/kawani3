<?php

namespace Kawani\Http\Middleware;

use Closure;
use Auth;
use Redirect;

class AuthGudangStaf
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
        if (!Auth::user())
        {
            return Redirect::to('login')->with('message','Anda tidak memiliki hak akses');
        }
        else
        {
            if(Auth::user()->level != 'Gudang' or
               Auth::user()->level != 'Staf' or
               Auth::user()->level != 'Admin')
            {
                return Redirect::to('login')->with('message','Anda tidak memiliki hak akses');
            }
        }
        return $next($request);
    }
}
