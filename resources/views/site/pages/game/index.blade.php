<x-layouts.site.app>
    <x-slot name="title">{{ $page->title ?? trans('interface.titles.about') }}</x-slot>
    <x-slot name="description">{{ $page->description ?? trans('interface.titles.about') }}</x-slot>

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
                    <h3 class="card-title">2D додаток-гра «Готські скарби» 2D додаток-гра «Готські скарби»</h3>
                    <p class="card-text" style="font-size: 1.2em;">Виконаний з урахуванням візуального відтворення персонажів, елементів побуту древніх готів. Зокрема, в ігровому додатку розроблені ігрові структури – «спрайти» у вигляді капищ (вимощених вогнищ на майданчиках), стилізованих предметів побуту (фібул, римських монет) тощо. Ігровий додаток розрахованих для дітей дошкільного та молодшого шкільного віку.</p>
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
                    <h3 class="card-title">Мультимедійна вікторина</h3>
                    <p class="card-text" style="font-size: 1.2em;">Мультимедійна вікторина слугуватиме узагальненням знань про історичне минуле України з початку появи одних з найдавніших людей на території України – готів. Україна належить до країн з багатою історико-культурною спадщиною і розроблена вікторина присвячена підсумку результатів досліджень міграції готів у І–IІ ст. через українські землі: напрямків і шляхів їх міграції, етнічного складу, культури, поведінки, особливостей побуту. Вікторина розрахована на школярів середнього та старшого шкільного віку.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.site.app>