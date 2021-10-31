<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;

use Closure;
use Illuminate\Http\Request;

class MustBeAdministrator
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
        if (auth()->user()->username !== 'lukabrazi') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
