window.showToastsMessage = function (content = '', type = 'success') {
    let setting = {};

    switch (type) {
        case 'success':
            setting = {
                class: `bg-${type}`,
                autohide: true,
                delay: 2500,
                title: content,
                icon: 'fa fa-check fa-lg',
            };
            break;
        case 'warning':
            setting = {
                class: `bg-${type}`,
                title: 'Помилка!',
                body: content,
                icon: 'fa fa-warning fa-lg',
            };
            break;
        default:
            return;
    }

    $(document).Toasts('create', setting);
}

let message = $('.js--message');
if (!!message.length) {
    showToastsMessage(message.html(), message.data('type'));
}

window.showSuccessToastsMessage = function (content = '') {
    showToastsMessage(content);
}

window.showWarningToastsMessage = function (content = '') {
    showToastsMessage(content, 'warning');
}
