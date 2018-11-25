var selectPage = 0;

var adminPageOrder = ["", "terreaux", "bellecour", "perrache"];

// Schéma Menu
var listMenu = [["Parallaxe", "Bandeau"], ["Histoire", "Monument", "Activité", "Restaurant", "Parallaxe"], ["Parallaxe", "Text contact"]];

// Liste des composants
var componentsConfig = {
    "Histoire": "patrimoineConfig",
    "Monument": "patrimoineConfig",
    "Activité": "patrimoineConfig",
    "Restaurant": "patrimoineConfig",
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
        let item = $("<a class='nav-link' id='v-pills-settings-tab' data-toggle='pill'" + "data-index=" + elem + " data-toload='" + componentsConfig[list[elem]] + "' href='#' role='tab' aria-selected='false'>" + list[elem] + "</a>");
        $("div.sidebarAdmin").append(item);
    }
    $("div.sidebarAdmin").children(":first").addClass("active show");
    $("a.nav-link#v-pills-settings-tab").click(function() {
        $("#patrimoineConfig").hide();
        $(".contentAdmin > .spinner").show();
        let componentToLoad = $(this).data("toload");
        if(componentToLoad == "patrimoineConfig") {
            // 1 - On supprime les composants des autres onglets
            let toSave = $("#patrimoineContent").find(".media").first();
            $("#patrimoineContent").empty();
            toSave.appendTo($("#patrimoineContent"));
            $.ajax({
                method: "GET",
                url: environnement.serviceUrl + "get" + list[$(this).data("index")].replace(/é/gi, "e") + "ByQuartier.php?quartier=" + adminPageOrder[selectPage]
                }).done(function(data) {
                    for(let patrimoine of data) {
                        let newComponent = addPatrimoineComponents();
                        if(patrimoine.image != null)
                            newComponent.find("img.imgAdmin").attr('src', path[patrimoine.codeQuartier] + patrimoine.image)
                    }
                    $(".contentAdmin > .spinner").hide();
                    $("#patrimoineConfig").show();
                });
        } else {
            loadComponents(componentToLoad);
            $(".contentAdmin > .spinner").hide();
        }
    });
    $("a.nav-link.active.show#v-pills-settings-tab").trigger('click');
}

function loadComponents(componentToLoad) {
    let component = $("#"+componentToLoad);
    component.show();
}

// Ajout un composant parralax
function addParallaxComponents() {
    let content = $("#parallaxConfig").find(".media").first();
    content.clone().appendTo($("#patrimoineContent"));
    $("#patrimoineContent").find(".media").last().attr('id', lastIndex +1);
    $("#patrimoineContent").find(".media").last().show();
    return $("#patrimoineContent").find(".media").last();
}

// Ajout un composant patrimoine
function addPatrimoineComponents() {
    lastIndex = parseInt($("#patrimoineContent").find(".media").last().attr('id'));
    let content = $("#patrimoineContent").find(".media").first();
    content.clone().appendTo($("#patrimoineContent"));
    $("#patrimoineContent").find(".media").last().attr('id', lastIndex +1);
    $("#patrimoineContent").find(".media").last().show();
    return $("#patrimoineContent").find(".media").last();
}