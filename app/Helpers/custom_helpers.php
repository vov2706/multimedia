<?php

use Illuminate\Support\Facades\App;

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
