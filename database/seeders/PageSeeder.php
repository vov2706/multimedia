<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        PageContent::truncate();

        $urls = [
            'about',
            'virtual-viewers-zone',
            '2d-game-android-and-ios',
            'reproduction-gothic-work'
        ];

        $names = [
            'Про проект',
            'Віртуальна глядацька зона',
            '«Готські скарби»',
            'Віртуальна студія',
        ];

        foreach ($urls as $url) {
            Page::create([
                'url' => $url
            ]);
        }

        foreach (config('app.locales') as $locale) {
            $allPages = Page::query()->whereIn('url', $urls)->get();

            foreach ($allPages as $index => $page) {
                PageContent::create([
                    'page_id' => $page->id,
                    'lang' => $locale,
                    'name' => $names[$index],
                    'text' => null
                ]);
            }
        }
    }
}
