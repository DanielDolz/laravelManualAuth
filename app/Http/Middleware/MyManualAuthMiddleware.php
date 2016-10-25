<?php

namespace App\Http\Middleware;

use App\ManualAuth\ManualGuard;
use Closure;

class MyManualAuthMiddleware
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
        $manualGuard = new ManualGuard();
        if ( $manualGuard->check() ) {
            return $next($request);
        }
        return redirect('login');
    }
}
