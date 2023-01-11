<script>
    var defLang = "{{ config('app.defLang') }}";
</script>

<script src="{{ mix('/js/vendor.js', 'admin') }}"></script>
<script src="{{ mix('/js/index.js', 'admin') }}"></script>

<script src="/admin/plugins/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    $('ul.nav-sidebar a.nav-link.active')
        .closest('ul.nav-treeview').css('display', 'block').closest('li.nav-item').addClass('menu-open').find('a.nav-link:first').addClass('active');
</script>
