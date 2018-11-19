var selectPage = 0;
// Au click sur les boutons de sélection de page
$("a.nav-item.nav-link").click(function() {
    // Si on click sur la page déjà chargé on ne la recharge pas
    if($(this).data("index") == selectPage) {
        return;
    }
    $("a.nav-item.nav-link").each(function() {
        $(this).removeClass("active");
    });
    selectPage = $(this).data("index");
    $(this).addClass("active");
    $("#content").hide();
    $(".adminContainer>.spinner").show();
    setTimeout(function() {
        $("#content").show();
        $(".adminContainer>.spinner").hide();
        $(".contentAdmin >.spinner").show();
    }, 1000);
});