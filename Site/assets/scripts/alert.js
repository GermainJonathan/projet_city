$(".alert.alert-danger").ready(function() {
    if($(".alert.alert-danger").length) {
        message = $(".alert.alert-danger").children().text();
        $('.alert.alert-danger').remove();
        $.notify({
            message: message
        }, {
            type:'danger',
            delay: 0
        });
    }
});
$(".alert.alert-warning").ready(function() {
    if($(".alert.alert-warning").length) {
        message = $(".alert.alert-warning").children().text();
        $('.alert.alert-warning').remove();
        $.notify({
            message: message
        }, {
            type:'warning'
        });
    }
});
$(".alert.alert-info").ready(function() {
    if($(".alert.alert-info").length) {
        message = $(".alert.alert-info").children().text();
        $('.alert.alert-info').remove();
        $.notify({
            message: message
        }, {
            type:'info'
        });
    }
});
$(".alert.alert-success").ready(function() {
    if($(".alert.alert-success").length) {
        message = $(".alert.alert-success").children().text();
        $('.alert.alert-success').remove();
        $.notify({
            message: message
        }, {
            type:'success'
        });
    }
});