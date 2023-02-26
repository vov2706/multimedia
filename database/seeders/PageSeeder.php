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
        Page::query()->truncate();
        PageContent::query()->truncate();

        $urls = [
            'about',
            'virtual-viewers-zone',
            'gothic-treasures',
            'virtual-studio'
        ];

        $names = [
            'Про проект',
            'Віртуальна глядацька зона',
            '«Готські скарби»',
            'Віртуальна студія',
        ];

        foreach ($urls as $url) {
            Page::query()->create([
                'url' => $url
            ]);
        }

        foreach (config('app.locales') as $locale) {
            $allPages = Page::query()->whereIn('url', $urls)->get();

            foreach ($allPages as $index => $page) {
                PageContent::query()->create([
                    'page_id' => $page->id,
                    'lang' => $locale,
                    'name' => $names[$index],
                ]);
            }
        }
    }
}
