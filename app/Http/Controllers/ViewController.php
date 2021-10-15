<?php

namespace App\Http\Controllers;

use App\Enum\Locales;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    protected $locale;
    protected $fallback_locale;
    protected $user;

    public function __construct()
    {
        $this->user = null;
        $this->locale = config('app.locale') ?: config('app.fallback_locale');
        $this->fallback_locale = config('app.fallback_locale');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->locale = $request->getLocale() ?: $this->locale;
            return $next($request);
        });


    }


    public function view($view = null, $data = [])
    {
        $response = new Response();
        $response->setContent(view($view, $data, [
            'user'=>$this->user,
            'fallback_locale'=>$this->fallback_locale,
            'locale'=>$this->locale,
            'locales' => Locales::AVAILABLE_LOCALES,
        ]));
        return $response;
    }
}
