$(window).scroll(function() {
    if(window.scrollY < 80) {
        $("ul.nav.navbar-nav").children(":first").children(":first").addClass("active");
    }
});
$(function(){
    setTimeout(function() {
        if($(location.hash).offset())
            $('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
    }, 1000);
});
