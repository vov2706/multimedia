<?php

namespace App\Actions\Admin\Page;

use App\Models\Page;
use App\Models\PageContent;

class StorePageData
{
    public function handle(Page $page, array $data): bool
    {
        if (empty($data)) {
            throw new \RuntimeException('Дані про сторінку відсутні!');
        }

        if (isset($data['active'])) {
            $page->update(['active' => (int) $data['active']]);
        }

        foreach (config('app.locales') as $locale) {
            $content = PageContent::firstOrNew(
                [
                    'page_id' => $page->id,
                    'lang' => $locale
                ]
            );

            $contentData = [];
            foreach ($page->getLocaleFields() as $field) {
                $contentData[$field] = $data["{$field}_{$locale}"];
            }

            $content->fill($contentData);

            if (! $content->save()) {
                throw new \RuntimeException('Помилка збереження контенту!');
            }
        }

        return true;
    }
}
