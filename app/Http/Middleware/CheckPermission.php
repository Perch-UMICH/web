<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
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
        if ($request->student != auth()->user()->username) {

            $url = explode("/", $request->path());
            array_pop($url);
            $url = implode('/', $url);
            return redirect($url);
        }
        return $next($request);
    }
}
