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

        $urls = ['virtual-viewers-zone', '2d-game-android-and-ios', 'reproduction-gothic-work'];
        $names = [
            'Облаштування віртуальної глядацької зони 3D – модель персонажу, воїна-лігійця германських племен І ст. н.е',
            'Мобільний 2D додаток-гра «Готські скарби» для платформі Android та IOS',
            'Облаштування віртуальної студії готської культури'
        ];
        $texts = [
            'Облаштування віртуальної глядацької зони 3D – модель персонажу, воїна-лігійця германських племен І ст. н.е',
            'Розробка мультимедійної анімації для дітей. Мобільний 2D додаток-гра «Готські скарби» для платформі Android та IOS',
            'Облаштування віртуальної студії готської культури. Мультимедійне відтворення вельбарських та черняхівських поселень готів (близько 190 р.), макети їх поселень. Стилізоване відтворення занять, будівель, побуту. Наочне відтворення способу життя. Віртуальна реконструкція'
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
                    'text' => $texts[$index]
                ]);
            }
        }
    }
}
