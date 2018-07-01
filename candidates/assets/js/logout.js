
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
function logoutUser() {
    request = $.ajax({
        url: 'assets/php/logout.php',
        contentType: 'application/x-www-form-urlencoded',
        type: 'POST',
        data: [{name:'logout',value:'true'}]
    })

    request.done((response, textStatus, jqXHR) => {
        // console.log(destination)  
        window.location.href = JSON.parse(response).destination;
    })
    request.fail((jqXHR, textStatus, errorThrown) => {
        sendNoteError('top', 'right', 'danger', `Request Failure: ${textStatus}: ` + errorThrown, 6000)
    })
    request.always(() => {
    })
}