<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        if(config('env.APP_DEBUG')){
            return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "PUT, POST, DELETE, GET, OPTIONS")
            ->header('Access-Control-Allow-Headers', "Accept, Authorization, Content-Type");
        }

        return $next($request);
    }
}
