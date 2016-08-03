<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotSubscribed
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
            if($request->user() && ! $request->user()->subscribed('standard')){
                return redirect('account/subscribe');
            }
            return $next($request);
    }
}
