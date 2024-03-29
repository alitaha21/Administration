<?php

namespace App\Http\Middleware;

use Closure;
use App;

class SetLanguageMiddleware
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

        App::setLocale(session('locale'));

        return $next($request);
    }
}
