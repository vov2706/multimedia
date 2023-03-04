<div>
    <nav class="navbar navbar-expand-lg navbar-font w-100 position-fixed">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav w-auto justify-content-center row">
                @foreach($pages as $page)
                    <li class="nav-item col">
                        <a class="nav-link active" aria-current="page" href="{{ $page->getUrl() }}">{{ $page->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex-row float-right w-auto d-flex" style="margin-right: 15px">
            <a class="nav-link" href="#">ua</a>|<a class="nav-link" href="#">en</a>
        </div>
    </nav>
    <img src="{{ asset('back1.jpg') }}" class="overlay_image" alt=""/>
</div>
