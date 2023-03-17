<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::query()->truncate();
        PageContent::query()->truncate();

        $urls = [
            'index',
            'virtual-viewers-zone',
            'games',
            'virtual-studio'
        ];

        $names = [
            'ua' => [
                'Головна',
                'Віртуальна глядацька зона',
                'Ігри',
                'Віртуальна студія'
            ],
            'en' => [
                'Home',
                'Virtual Viewers Zone',
                'Games',
                'Virtual Studio'
            ],
        ];

        foreach ($urls as $url) {
            Page::query()->create([
                'url' => $url
            ]);
        }

        foreach (config('app.locales') as $locale) {
            $allPages = Page::query()->whereIn('url', $urls)->orderBy('id')->get();

            foreach ($allPages as $index => $page) {
                PageContent::query()->create([
                    'page_id' => $page->id,
                    'lang' => $locale,
                    'name' => $names[$locale][$index],
                ]);
            }
        }

        Cache::forget('site_pages');
    }
}
