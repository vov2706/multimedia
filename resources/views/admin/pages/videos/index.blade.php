<x-layouts.admin.layout :show-index-scripts="false">
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
            </div>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="card card-outline card-primary col-md-12 col-xl-6">
                <div class="card-header">
                    <h3 class="card-title">
                        Галерея
                    </h3>
                </div>
                <div class="card-body">
                    <div id="video"></div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    @push('scripts')
        <script src="{{ mix('/js/video.js', 'admin') }}"></script>
    @endpush
</x-layouts.admin.layout>
