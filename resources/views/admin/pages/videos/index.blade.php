<x-layouts.admin.layout>
    <x-slot name="title">Редактор відео</x-slot>
    <x-slot name="description">Редактор відео</x-slot>

    <div class="content-wrapper">
        <x-admin.message></x-admin.message>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid d-sm-flex justify-content-between align-items-center block-title">
                <div class="d-inline">
                    <h1 class="mb-3">
                        Відео для сторінки "{{ $page->name }}"
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
                    <form id="form" action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="form-group">
                                    <div class="show-block gallery-list-sortable custom--show-block">
                                        <div class="add-img-block mb-20 ui-state-disabled">
                                            <input type="file" multiple name="video_gallery[]"
                                                   accept=".avi"
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
                id="removeVideos"
                text="Дану дію буде неможливо відмінити!"
                actionButton="delete-btn-video">
            </x-admin.modal>
        </section>
        <!-- /.content -->
    </div>
</x-layouts.admin.layout>
