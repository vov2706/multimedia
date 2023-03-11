<x-layouts.site.app>
    <x-slot name="title">{{ $page->title ?? trans('interface.titles.virtual-studio') }}</x-slot>
    <x-slot name="description">{{ $page->description ?? trans('interface.titles.virtual-studio') }}</x-slot>

    <x-slot name="h1">{{ $page->h1 }}</x-slot>
    <x-slot name="h2">{{ $page->h2 }}</x-slot>
    <x-slot name="text">{!! $page->text !!}</x-slot>

    <photos-component :images="{{ json_encode($images) }}" />
</x-layouts.site.app>
