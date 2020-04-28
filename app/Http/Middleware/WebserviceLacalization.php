<?php

namespace App\Http\Middleware;

use Closure;
use App;

class WebserviceLacalization
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
        if(isset($request->lang)){
          App::setLocale($request->lang);
        }else {
          App::setLocale('ar');
        }
        return $next($request);
    }
}
