
var request;
let sendNoteError = (from, align, type, message, timer) => {
    $.notify({
        icon: "fa fa-exclamation-triangle fa-lg",
        message: message,
    }, {
            type: type,
            timer: timer,
            placement: {
                from: from,
                align: align
            }
        });
}
let sendNoteSuccess = (from, align, type, message, timer) => {
    $.notify({
        icon: "fa fa-gift fa-lg",
        message: message,
    }, {
            type: type,
            timer: timer,
            placement: {
                from: from,
                align: align
            }
        });
}
