var selectPage = 0;

var oldComponent;

// Schéma Menu
var listMenu = [["Parallaxe", "Bandeau"], ["Histoire", "Monuments", "Activités", "Restaurants", "Parallaxe"], ["Parallaxe", "Text contact"]];

// Liste des composants
var components = {
    "Histoire": "patrimoineConfig",
    "Monuments": "patrimoineConfig",
    "Activités": "patrimoineConfig",
    "Restaurants": "patrimoineConfig",
    "Parallaxe": "parallaxConfig",
    "Bandeau": "bandeauConfig",
    "Text contact": "contactConfig"
};

generateList(listMenu[0]);

$("#upfile1").click(function() {
    $("#file1").trigger('click');
});

$("#upfile2").click(function() {
    $("#file2").trigger('click');
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
        let item = $("<a class='nav-link' id='v-pills-settings-tab' data-toggle='pill' data-toload='" + components[list[elem]] + "' href='#' role='tab' aria-selected='false'>" + list[elem] + "</a>");
        $("div.sidebarAdmin").append(item);
    }
    $("div.sidebarAdmin").children(":first").addClass("active show");
    $("a.nav-link#v-pills-settings-tab").click(function() {
        let componentToLoad = $(this).data("toload");
        loadComponents(componentToLoad);
    });
    $("a.nav-link.active.show#v-pills-settings-tab").trigger('click');
}

function loadComponents(componentToLoad) {
    // FIXME: Binder les services
    // Requete de récupération des données (patrimoine au moins)
    // $.ajax({
    //     method: "GET",
    //     url: environnement.serviceUrl + "get" + ???? + "ByQuartier.php?quartier="+e.target.feature.properties.name
    //   }).done(function(data) {
    //       // Add Some code
    //   });
    if(oldComponent)
        oldComponent.hide();
    let component = $("#"+componentToLoad);
    component.show();
    oldComponent = component;
}

// Ajout un composant patrimoine
function addComponents() {
    let content = $(oldComponent).find(".media").first();
    content.clone().appendTo($("#patrimoineContent"));
}