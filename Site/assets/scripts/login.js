var x = 0;
var y = 0;
$(".login-form").on('mousemove',function parralaxMouse(window) {
    calculCoordonnees(window);
});
$(".login-form-group").on('mousemove',function parralaxMouse(window) {
    calculCoordonnees(window);
});
$(".navbar.navbar-expand-lg.navbar-light").on('mousemove',function parralaxMouse(window) {
    calculCoordonnees(window);
});

function calculCoordonnees(window) {
    x = 20 * ($(".login-form").width() / 2 - window.clientX) / 500;
    y = 10 * ($(".login-form").height() / 2 - window.clientY) / 500;
    $(".login-form").css('transform', 'translate(' + x + "px, " + y + "px) scale(1.2)");
    $(".login-form-group").css('box-shadow', -x + 'px ' + -y + 'px 0px 3px rgba(0,0,0,.4)');
}