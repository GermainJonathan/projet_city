var selectPage = 0;

var listMenu = [["Parralax", "Bandeau"], ["Histoire", "Monuments", "Activités", "Restaurants"], ["Parralax", "Text contact"]];

generateList(listMenu[0]);

$("#upfile1").click(function() {
    $("#file1").trigger('click');
});

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
    if(selectPage == 0) {
        generateList(listMenu[0]);
    }
    else if(selectPage == 4) {
        generateList(listMenu[2]);
    }
    else {
        generateList(listMenu[1]);
    }
    setTimeout(function() {
        $("#content").show();
        $(".adminContainer>.spinner").hide();
        // $(".contentAdmin >.spinner").show();
    }, 1000);
});

function generateList(list) {
    $("div.sidebarAdmin").empty();
    for(let elem in list) {
        let item = $("<a class='nav-link' id='v-pills-settings-tab' data-toggle='pill' data-search='" + elem + "' href='#' role='tab' aria-selected='false'>" + list[elem] + "</a>");
        $("div.sidebarAdmin").append(item);
    }
    $("div.sidebarAdmin").children(":first").addClass("active show");
}
