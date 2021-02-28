<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LibraryMiddleware
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
        if (auth()->user() != null)
        {
            if (isset(auth()->user()->id)) 
            {
                $request->merge(['UserId' => auth()->user()->id]);
            }
        }
        return $next($request);
    }
}
