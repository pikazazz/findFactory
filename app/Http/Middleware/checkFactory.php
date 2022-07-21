<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkFactory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$factoryId)
    {
        if(Auth::user()){
            if ($factoryId == Auth::user()->factory) {
                return $next($request);
            }else{
                return redirect()->route('login');
            }


        }else{
            return redirect()->route('login');
        }
    }
}
