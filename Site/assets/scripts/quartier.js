$(window).scroll(function() {
    if(window.scrollY < 100) {
        $("ul.nav.navbar-nav").children(":first").children(":first").addClass("active");
    }
});