<div>
    <nav class="navbar navbar-expand-lg navbar-font w-100 position-fixed">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav justify-content-center" style="flex-wrap: nowrap">
                @foreach($pages as $page)
                    <li style="margin: 10px">
                        <a class="nav-link active" aria-current="page" href="{{ $page->getUrl() }}">{{ $page->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-row float-right w-auto d-flex" style="margin-right: 15px">
            @foreach($localeLinks as $locale => $link)
                <a class="nav-link" href="{{ $link }}">{{ $locale }}</a>
                @if(! $loop->last) | @endif
            @endforeach
        </div>
    </nav>
    <img src="{{ asset('back1.jpg') }}" class="overlay_image" alt=""/>
</div>
