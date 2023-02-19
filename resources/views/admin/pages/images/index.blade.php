<x-layouts.admin.layout>
    <x-slot name="title">Редактор зображень</x-slot>
    <x-slot name="description">Редактор зображень</x-slot>

    <div class="content-wrapper">
        <x-admin.message></x-admin.message>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid d-sm-flex justify-content-between align-items-center block-title">
                <div class="d-inline">
                    <h1 class="mb-3">
                        Зображення для сторінки "{{ $page->name }}"
                    </h1>
                </div>
                <button type="submit" form="form" class="btn btn-success saved">
                    <i class="fa fa-save"></i>
                </button>
            </div>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="card card-outline card-primary col-md-12 col-xl-9">
                <div class="card-header">
                    <h3 class="card-title">
                        Галерея
                    </h3>
                </div>
                <div class="card-body">
                    <form id="form" action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <div class="show-block gallery-list-sortable custom--show-block">
                                        @foreach($page->getMedia('images') as $image)
                                            <div class="show-item" id="{{ $image->id }}">
                                                <input type="hidden" name="savedImg" class="savedImg" value="1">
                                                <input type="hidden" name="delete_gallery[{{ $image->id }}]" class="delete-field" value="0">
                                                <a href="#" class="removeImages">×</a>
                                                <img src="{{ $image->getUrl() }}" width="200">
                                            </div>
                                        @endforeach

                                        <div class="add-img-block mb-20 ui-state-disabled">
                                            <input type="file" multiple name="image_gallery[]"
                                                   accept=".jpg,.jfif,.jpe,.jpeg,.png,.webp"
                                                   class="file-input-gallery" style="display: none">
                                            <div class="empty-photo size-photo gallery">
                                                <label class="load-photo">
                                                    <span class="old-text">
                                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                                        Додати фото
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Модальне вікно для підтвердження видалення зображення-->
            <x-admin.modal
                id="removeImages"
                text="Дану дію буде неможливо відмінити!"
                actionButton="delete-btn-image">
            </x-admin.modal>
            {{--Croppie modal--}}
            <x-admin.croppie-modal/>
        </section>
        <!-- /.content -->
    </div>
    @push('scripts')
        @include('admin.pages.images.scripts')
    @endpush
</x-layouts.admin.layout>
