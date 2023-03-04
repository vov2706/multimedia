<x-layouts.site.app>
    <x-slot name="title">{{ $page->title ?? trans('interface.titles.virtual-studio') }}</x-slot>
    <x-slot name="description">{{ $page->description ?? trans('interface.titles.virtual-studio') }}</x-slot>

    <x-slot name="h1">{{ $page->h1 }}</x-slot>
    <x-slot name="h4">{{ $page->h2 }}</x-slot>

    <photos-component :images="[
        {url: 'http://placehold.it/1200x800'},
        {url: 'http://placehold.it/1200x800'},
        {url: 'https://i.imgur.com/WcHGTSP.jpeg'},
      ]">

    </photos-component>

    <x-slot name="text">{{ $page->text }}</x-slot>

</x-layouts.site.app>
