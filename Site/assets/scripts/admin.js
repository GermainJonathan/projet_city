$("a.nav-item.nav-link").click(function() {
    $("a.nav-item.nav-link").each(function() {
        $(this).removeClass("active");
    });
    $(this).addClass("active");
});