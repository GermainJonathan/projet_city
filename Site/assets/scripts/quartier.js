$(window).scroll(function() {
    if(window.scrollY < 80) {
        $("ul.nav.navbar-nav").children(":first").children(":first").addClass("active");
    }
});
$(function(){
    setTimeout(function() {
        $('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
    }, 1000);
});