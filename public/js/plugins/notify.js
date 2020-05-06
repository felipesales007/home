// notification
function notify(data) {
    let enter;
    let exit;

    if (data.from === 'top') {
        enter = 'fadeInDown';
        exit  = 'fadeOutUp';
    } else {
        enter = 'fadeInUp';
        exit  = 'fadeOutDown';
    }

    $.notify({
        icon: 'alert-icon ' + data.icon,
        title: data.title,
        message: data.message
    }, {
        type: data.type,
        timer: 2000,
        placement: {
            from: data.from,
            align: data.align
        },
        animate: {
            enter: 'animated ' + enter,
            exit: 'animated ' + exit
        },
        template:
            '<div data-notify="container" class="col-xs-11 col-sm-3 alert-dismissible alert-notify alert alert-{0} fe-radius" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '<span data-notify="icon"></span>' +
            '<div class="alert-text">' +
            '<span class="alert-title" data-notify="title">{1}</span>' +
            '<span data-notify="message">{2}</span>' +
            '</div>' +
            '</div>'
    });
}

// error notification
function notifyError(message) {
    $.notify({
        icon: 'alert-icon fas fa-exclamation-triangle',
        title: 'Notificação',
        message: message
    }, {
        type: 'warning',
        timer: 2000,
        placement: {
            from: 'top',
            align: 'center'
        },
        template:
            '<div data-notify="container" class="col-xs-11 col-sm-3 alert-dismissible alert-notify alert alert-{0} fe-radius" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '</button>' +
            '<span data-notify="icon"></span>' +
            '<div class="alert-text">' +
            '<span class="alert-title" data-notify="title">{1}</span>' +
            '<span data-notify="message">{2}</span>' +
            '</div>' +
            '</div>'
    });
}
