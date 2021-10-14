<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next)
    {

        $lang = $request->lang ?: config('app.fallback_locale');
        config(['app.locale' => $lang]);
        $request->setLocale($lang);
//        dd($request->lang, config('app.locale'));
        return $next($request);
    }
}
