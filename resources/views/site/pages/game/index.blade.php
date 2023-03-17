<x-layouts.site.app>
    <x-slot name="title">{{ $page->title ?? trans('interface.titles.games') }}</x-slot>
    <x-slot name="description">{{ $page->description ?? trans('interface.titles.games') }}</x-slot>

    <x-slot name="h1">{{ $page->h1 }}</x-slot>
    <x-slot name="h2">{{ $page->h2 }}</x-slot>

    <div class="card mb-2">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <a href="https://play.unity.com/mg/other/webtest-3-3" target="_blank">
                        <i class="fa fa-play-circle"></i>
                    </a>
                </div>
                <img src="{{ asset('gothic_treasures.jpg') }}" class="card-img" alt="your-image-alt-text">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        @lang('interface.games.gothic-treasures.title')
                    </h3>
                    <p class="card-text" style="font-size: 1.2em;">
                        @lang('interface.games.gothic-treasures.text')
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-2">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <a href="https://play.unity.com/mg/other/webtest-3-3" target="_blank">
                        <i class="fa fa-play-circle"></i>
                    </a>
                </div>
                <img src="{{ asset('gothic_treasures.jpg') }}" class="card-img" alt="your-image-alt-text">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">
                        @lang('interface.games.multimedia-quiz.title')
                    </h3>
                    <p class="card-text" style="font-size: 1.2em;">
                        @lang('interface.games.multimedia-quiz.text')
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.site.app>
