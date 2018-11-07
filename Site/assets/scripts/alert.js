$(".alert.alert-danger").ready(function() {
    message = $(".alert.alert-danger").children().text();
    $('.alert.alert-danger').remove();
    $.notify({
        message: message
    }, {
        type:'danger',
        delay: 0
    });
});
$(".alert.alert-warning").ready(function() {
    message = $(".alert.alert-warning").children().text();
    $('.alert.alert-warning').remove();
    $.notify({
        message: message
    }, {
        type:'warning'
    });
});
$(".alert.alert-info").ready(function() {
    message = $(".alert.alert-info").children().text();
    $('.alert.alert-info').remove();
    $.notify({
        message: message
    }, {
        type:'info'
    });
});
$(".alert.alert-success").ready(function() {
    message = $(".alert.alert-success").children().text();
    $('.alert.alert-success').remove();
    $.notify({
        message: message
    }, {
        type:'success'
    });
});