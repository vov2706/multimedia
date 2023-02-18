<x-layouts.admin.layout>
    <x-slot name="title">Редактор сторінок</x-slot>
    <x-slot name="description">Редактор сторінок</x-slot>

    <div class="content-wrapper">
        <x-admin.message></x-admin.message>

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row col-md-12 col-lg-10 col-xl-8 ml-0">
                <h1 class="col-7 col-md-9">
                    Редагування сторінки
                </h1>
            </div>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <form
                    action=""
                    method="POST"
                    class="js--select-form col-md-7 col-lg-7 col-xl-5"
                    autocomplete="off">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Виберіть сторінку для редагування
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-xs-12 col-sm-8 com-md-8">
                                <div class="form-group mb-md-0">
                                    <select
                                            class="form-control select-js"
                                            name="id"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 com-md-4 text-sm-right">
                                <div class="form-group mb-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        Редагувати
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>
    @push('scripts')
        <script>
            $(document).on('submit', 'form.js--select-form', function(e) {
                e.preventDefault();

                const slug = $("select[name=id] option:selected").val();

                if (slug.length) {
                    window.location = '/admin-panel/pages/' + slug + '/edit/';
                }
            });
        </script>
    @endpush
</x-layouts.admin.layout>
