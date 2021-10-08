<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->user = null;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });


    }


    public function view($view = null, $data = [])
    {
        $response = new Response();
        $response->setContent(view($view, $data, ['user'=>$this->user]));
        return $response;
    }
}
