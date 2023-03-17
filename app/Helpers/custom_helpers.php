<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

if (! function_exists('get_locale')) {
    function get_locale(): string
    {
        return App::getLocale();
    }
}

if (! function_exists('set_locale')) {
    function set_locale(string $lang): void
    {
        if (in_array($lang, config('app.locales', []), true)) {
            App::setLocale($lang);
        }
    }
}

if (! function_exists('current_route_name')) {
    function current_route_name(): ?string
    {
        return Route::currentRouteName();
    }
}
