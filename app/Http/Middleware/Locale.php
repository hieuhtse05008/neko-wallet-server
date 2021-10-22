<?php

namespace App\Http\Middleware;

use App\Enum\Locales;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        dd($request->lang, $request->getLocale(), config('app.locale'), App::getLocale());
        $locales = Locales::AVAILABLE_LOCALES;
        $redirect_locale = $request->redirect_locale;
        $lang = $request->lang && in_array($request->lang, $locales) ? $request->lang : config('app.fallback_locale');

        if (in_array($request->redirect_locale, $locales) && $lang !== $redirect_locale) {
            $uri = $request->segments();
            //dd($lang , $redirect_locale,in_array($uri[0], $locales));
            if (count($uri) > 0 && in_array($uri[0], $locales)) {
                $uri[0] = $redirect_locale;
            } else {
                array_unshift($uri, $redirect_locale);
            }
//            dd(implode('/', $uri));
            return redirect(implode('/', $uri));
        }

        URL::defaults(['lang' => $lang]);
        config(['app.locale' => $lang]);
        $request->setLocale($lang);
        App::setLocale($lang);

//        dd($request->lang, config('app.locale'), App::getLocale());
        return $next($request);
    }
}
