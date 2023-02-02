<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ config('app.url') }}" class="brand-link bg-white">
        <img src="/admin/img/logo.webp" alt="logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Admin Panel</b></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview">
                <x-admin.sidebar-nav-link :href="route('admin.pages')" active="pages.*" icon-class="fas fa-file-word">
                    Сторінки
                </x-admin.sidebar-nav-link>
            </ul>
        </nav>
    </div>
</aside>
