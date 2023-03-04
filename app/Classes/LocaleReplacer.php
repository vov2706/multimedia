<?php

namespace App\Classes;

class LocaleReplacer
{
    public function getLinks(string $requestUri): array
    {
        $arrLang = [];

        foreach (config('app.locales') as $locale) {
            $arrLang[$locale] = get_locale() === $locale ? 'javascript:void(0);' : $this->makeLink($requestUri, $locale);
        }

        return $arrLang;
    }

    protected function makeLink(string $requestUri, string $locale): string
    {
        if ($requestUri === '' || $requestUri === '/') {
            return "/{$locale}/";
        }

        foreach (config('app.locales_without_default') as $otherLocale) {
            if ($requestUri === "/{$otherLocale}/") {
                return '/';
            }
        }

        $requestUri = substr($requestUri, 4);

        return "/{$locale}/{$requestUri}";
    }
}
