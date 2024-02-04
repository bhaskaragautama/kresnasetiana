function setFlash(message, type) {
    var alert_num = $(".flasher").children().length + 1;
    $(".flasher").append(
        `<div class="alert alert-${type} alert-dismissible fade show alert-${alert_num}" role="alert">${message}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`
    );
    setTimeout(function () {
        $(".alert-" + alert_num).fadeOut();
    }, 5000);
}
