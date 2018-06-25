<?php

namespace App\Http\Middleware;

use Session, Closure, App, Config, Cookie;

class SetLocale {

    public function handle($request, Closure $next) 
    {
        // if session is null, set the locale to the default language;
        // if(Session::has('locale')) {
        //     $locale = session('locale');
        // }
        // else {
        //     $locale = Config::get('app.locale');
        // }
        if(is_null(Cookie::get('locale_lang'))) {
            $cookie = Cookie::make('locale_lang', Config::get('app.locale'), 360);    
            return $next($request)->withCookie($cookie);
        }
        App::setLocale(Cookie::get('locale_lang'));
        // App::setLocale($locale);
// return response()->json(['lala' => App::getLocale()]);
        return $next($request);
    }

}