<x-layouts.admin.layout>
    <x-slot name="title">{{ $title ?? '' }}</x-slot>
    <x-slot name="description">{{ $title ?? '' }}</x-slot>

    <div class="content-wrapper">
        <x-admin.message></x-admin.message>

        <!-- Content Header (Page header) -->
        <section class="content-header my-c">
            <div class="container-fluid d-sm-flex justify-content-between align-items-center block-title">
                <div class="d-inline">
                    <h1 class="mb-3">
                        Редагування сторінки `{{ $item->name }}`
                    </h1>
                    <ol class="breadcrumb mb-2 mb-sm-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.pages.index') }}">Сторінки</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $item->name }}</li>
                    </ol>
                </div>
                <button type="submit" form="form" class="btn btn-success saved">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <form id="form" action="{{ route('admin.pages.update', [$item->id]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @method('PATCH')
                <div class="row max-width">
                    <div class="col-md-12 col-lg-10">
                        <div class="row">
                            <div class=" col-sm-12 col-md-12 col-lg-12">
                                <div class="card card-outline card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Сторінка</h3>
                                    </div>
                                    <div class="card-body row">
                                        <div class="form-group col-12 mb-0">
                                            <label>Назва<span class="required-star"></span></label>
                                            @foreach (config('app.locales') as $lang)
                                                @php set_locale($lang); @endphp
                                                <div class="input-group mb-3">
                                                    <span class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            {{ $lang }}
                                                        </div>
                                                    </span>
                                                    <input
                                                        type="text"
                                                        name="name_{{ $lang }}"
                                                        value='{{ old("name_$lang", $item->name) }}'
                                                        class="form-control"
                                                        required>
                                                </div>
                                            @endforeach
                                            @php set_locale(config('app.locale')); @endphp
                                        </div>
                                        <div class="form-group mb-0 col-12 text-right">
                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="hidden" name="active" value="0">
                                                <input
                                                    type="checkbox"
                                                    id="viewed"
                                                    name="active"
                                                    class="custom-control-input"
                                                    @if($item->active) checked @endif
                                                    value="1">
                                                <label for="viewed" class="custom-control-label">Відображати</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="card card-outline card-primary card-custom-tabs collapsed-card">
                                    <div class="card-header cursor-pointer" data-card-widget="collapse">
                                        <h3 class="card-title">
                                            Текст
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <ul class="nav nav-tabs" role="tablist">
                                            @foreach(config('app.locales') as $lang)
                                                <li class="nav-item">
                                                    <a class="nav-link @if($loop->first) active @endif"
                                                       id="{{ $lang }}"
                                                       data-toggle="pill"
                                                       href="#content-{{ $lang }}"
                                                       role="tab"
                                                       aria-selected="true">
                                                        {{ $lang }}
                                                    </a>
                                                </li>
                                            @endforeach
                                            <div class="tab-content overflow-auto col-12 p-0">
                                                @foreach(config('app.locales') as $lang)
                                                    @php set_locale($lang); @endphp
                                                    <div class="tab-pane fade @if($loop->first) active show @endif"
                                                         id="content-{{ $lang }}"
                                                         role="tabpanel"
                                                         aria-labelledby="{{ $lang }}"
                                                    >
                                                        <textarea class="tinymce" name="text_{{ $lang }}"
                                                                  placeholder="{{ $lang }}...">{{ old("text_$lang", $item->text) }}</textarea>
                                                    </div>
                                                @endforeach
                                                @php set_locale(config('app.locale')); @endphp
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="card card-outline card-primary collapsed-card">
                                    <div class="card-header cursor-pointer" data-card-widget="collapse">
                                        <h3 class="card-title">
                                            Мета-теги
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <div class="row">
                                            @foreach(config('app.locales') as $lang)
                                                @php set_locale($lang); @endphp
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">h1 ({{ $lang }})</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    {{ $lang }}
                                                                </div>
                                                            </div>
                                                            <input
                                                                    type="text"
                                                                    name="h1_{{ $lang }}"
                                                                    value='{{ old("h1_$lang", $item->h1 ?? '') }}'
                                                                    data-lang="{{ $lang }}"
                                                                    class="form-control font-weight-bold"
                                                                    placeholder="{{ $lang }}...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Title ({{ $lang }})</label>
                                                        <textarea
                                                                class="form-control font-weight-bold"
                                                                name="title_{{ $lang }}"
                                                                rows="2"
                                                                placeholder="{{ $lang }}..."
                                                        >{{ old("title_$lang", $item->title ?? '') }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-normal">Description ({{ $lang }})</label>
                                                        <textarea
                                                                class="form-control font-weight-bold"
                                                                name="description_{{ $lang }}"
                                                                rows="5"
                                                                placeholder="{{ $lang }}...">{{ old("description_$lang", $item->description ?? '') }}</textarea>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @php set_locale(config('app.locale')); @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-success float-right btn-styles">
                                    <i class="fa fa-save"></i>
                                    Зберегти
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
</x-layouts.admin.layout>
