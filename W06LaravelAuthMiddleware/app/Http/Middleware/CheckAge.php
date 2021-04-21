<?php

namespace App\Http\Middleware;
namespace Illuminate\Session\Middleware;

use Closure;

class CheckAge
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
        if ($request->age <= 200) {
            return redirect('home');
        }
        
        return $next($request);
    }
}

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}

class AfterMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response;
    }
}

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if(! $request->user()->hasRole($role)){
            //
        }
        return $next($request);
    }
}

class StartSession
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        //
    }
}