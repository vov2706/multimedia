// modal autofocus
$('.modal').on('shown.bs.modal', function() {
    $(this).find('[autofocus]').focus();
});
