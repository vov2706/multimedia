<x-layouts.site.app>
    <x-slot name="title">{{ $page->title ?? trans('interface.titles.virtual-viewers-zone') }}</x-slot>
    <x-slot name="description">{{ $page->description ?? trans('interface.titles.virtual-viewers-zone') }}</x-slot>

    <x-slot name="h1">{{ $page->h1 }}</x-slot>
    <x-slot name="h2">{{ $page->h2 }}</x-slot>
    <x-slot name="text">{!! $page->text !!}</x-slot>

    <videos-component :videos="{{ json_encode($videos) }}" />
</x-layouts.site.app>
