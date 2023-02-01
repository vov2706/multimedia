$('.js--custom-dropdown').on('click', function (event) {
    $(this).toggleClass('show');
    $(this).siblings().toggleClass('show');
});
$('body').on('click', function (e) {
    if (!$('.js--custom-dropdown').is(e.target)
        && $('.js--custom-dropdown').has(e.target).length === 0
        && $('.show').has(e.target).length === 0
    ) {
        $('.js--custom-dropdown').removeClass('show')
            .siblings().removeClass('show');
    }
});
