// select2
$('.select-js').select2({
    width: '100%',
    "language": {
        "noResults": function() {
            return "Результатів не знайдено";
        }
    }
});
$(document).on('select2:open', () => {
    document.querySelector('.select2-search__field').focus();
});
