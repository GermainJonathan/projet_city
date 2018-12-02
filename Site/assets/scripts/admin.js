var selectPage = 0;

var adminPageOrder = ["", "terreaux", "bellecour", "perrache"];

var oldConfig;

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
    if(selectPage == 0) {
        generateList(listMenu[0]);
    }
    else if(selectPage == 4) {
        generateList(listMenu[2]);
    }
    else {
        generateList(listMenu[1]);
    }
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
            if(oldConfig)
                $("#"+oldConfig).hide();
            let toSave = $("#patrimoineContent").find(".media").first();
            $("#patrimoineContent").empty();
            toSave.appendTo($("#patrimoineContent"));

            let typeComponent =  list[$(this).data("index")];
            $.ajax({
                method: "GET",
                url: environnement.serviceUrl + "get" + typeComponent.replace(/é/gi, "e") + "ByQuartier.php?quartier=" + adminPageOrder[selectPage]
                }).done(function(data) {
                    for(let patrimoine of data) {
                        let newComponent = addPatrimoineComponents();
                        $.ajax({
                            url: path[patrimoine.codeQuartier] + patrimoine.image,
                            type: 'HEAD',
                        }).fail(function () {
                            newComponent.find("img.imgAdmin").attr('src', "/assets/images/core/undefined.png");
                            updateComponent(typeComponent, newComponent, patrimoine);
                        }).done(function() {
                            newComponent.find("img.imgAdmin").attr('src', path[patrimoine.codeQuartier] + patrimoine.image);
                            updateComponent(typeComponent, newComponent, patrimoine);
                        });
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

// Charge le composant donnée en paramètre
function loadComponents(componentToLoad) {
    if(oldConfig)
        $("#"+oldConfig).hide();
    let component = $("#"+componentToLoad);
    component.show();
    oldConfig = componentToLoad;
}

// Ajout un composant patrimoine
function addPatrimoineComponents() {
    let lastIndex = parseInt($("#patrimoineContent").find(".media").last().attr('id'));
    let content = $("#patrimoineContent").find(".media").first();
    content.clone().appendTo($("#patrimoineContent"));
    $("#patrimoineContent").find(".media").last().attr('id', lastIndex +1);
    $("#patrimoineContent").find(".media").last().show();
    return $("#patrimoineContent").find(".media").last();
}

function updateComponent(typeComponent, component, dataComponent) {
    switch(typeComponent) {
        case "Histoire":
            component.find("#id").val(dataComponent.codeHistoire);
            component.find("#title").val(dataComponent.libelleMonument);
            component.find("#description").val(dataComponent.commentaire);
            break;
        case "Monument":
            component.find("#id").val(dataComponent.codeMonument);
            component.find("#title").val(dataComponent.libelleMonument);
            component.find("#description").val(dataComponent.commentaire);
            let architecte = $("<div class='form-inline' data-id='2'><label class='col-2 align-self-left' for='archi'><h4 class='text-truncate'>Architecte</h4></label><input name='architecte' type='text' class='form-control col-8' id='archi'></div>");
            architecte.find("#archi").val(dataComponent.architecte);
            architecte.appendTo(component.find(".media-body"));
            break;
        case "Activité":
            component.find("#id").val(dataComponent.codeActivite);
            component.find("#title").val(dataComponent.titre);
            component.find("#description").val(dataComponent.commentaire);
            break;
        case "Restaurant":
            component.find("#id").val(dataComponent.codeRestaurant);
            component.find("#title").val(dataComponent.nom);
            component.find("#description").val(dataComponent.commentaire);
            let telephone = $("<div class='form-inline' data-id='2'><label class='col-2 align-self-left' for='tel'><h4 class='text-truncate'>Telephone</h4></label><input name='telephone' type='text' class='form-control col-8' id='tel'></div>");
            telephone.find("#tel").val(dataComponent.numero);
            telephone.appendTo(component.find(".media-body"));
            let adresse = $("<div class='form-inline' data-id='3'><label class='col-2 align-self-left' for='adresse'><h4 class='text-truncate'>Adresse</h4></label><input name='adresse' type='text' class='form-control col-8' id='adresse'></div>");
            adresse.find("#adresse").val(dataComponent.adresse);
            adresse.appendTo(component.find(".media-body"));
            break;
        default:
            break;
    }
    // Tri des inputs
    component.find(".media-body div").sort(function(a,b) {
        return ($(a).data("id") > $(b).data("id")) ? ($(a).data("id") > $(b).data("id")) ? 1 : 0 : -1;
    }).appendTo(component.find(".media-body"));
}

function generateFormData(patrimoine, type) {
    let data = {};
    switch(type) {
        case "Histoire":
            data = {
                'idHistoire' : patrimoine[0].value,
                'description' : patrimoine[2].value
            }
            break;
        case "Monument":
            data = {
                'idMonument' : patrimoine[0].value,
                'description' : patrimoine[3].value
            }
            break;
        case "Activité":
            data = {
                'idActivite' : patrimoine[0].value,
                'description' : patrimoine[2].value
            }
            break;
        case "Restaurant":
            data = {
                'idRestaurant' : patrimoine[0].value,
                'description' : patrimoine[4].value
            }
            break;
        default:
            break;
    }
    return data;
}

// Fonction permettant de binder les inputs files (hidden) au bouton de selection d'image
function fileBrowser(inputFile) {
    inputFile.trigger('click');  
}

// Permet de faire une preview de l'image a uploadé
function upload(file, imageDiv) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            imageDiv.attr('src', e.target.result);
        };
        reader.readAsDataURL(file.files[0]);
    }
}

function savePatrimoine() {
    $("#patrimoineConfig").hide();
    $(".contentAdmin > .spinner").show();
    var objects = [];
    var images = [];
    $("#patrimoineContent > form").each(function() {
        var formData = new FormData();
        if($(this).find("#file").prop('files')[0]) {
            formData.append('image', $(this).find("#file").prop('files')[0], $(this).find("#file").prop('files')[0].name);
        }
        images.push($(this).find("#file").prop('files')[0]);
        objects.push($(this).serializeArray());
    })
    objects.shift();
    images.shift();
    var type = listMenu[1][$(".sidebarAdmin>a.nav-link.active").data("index")];
    for(let i = 0; i<objects.length; i++) {
        let data = generateFormData(objects[i], type);
        // Mise à jour des champs
        $.ajax({
            method: 'POST',
            url: environnement.serviceUrl + "adminUpdateDescription" + type.replace(/é/gi, "e") + ".php",
            data : JSON.stringify(data),
            contentType : 'application/json'
        }).done(function() {
            $.notify({
                message: "Object update"
            }, {
                type:'info'
            });
            $(".contentAdmin > .spinner").hide();
            $("#patrimoineConfig").show();
        });
        if(images[i]) {
            var formData = new FormData();
            formData.append('id', objects[i][0].value);
            formData.append('image', images[i], images[i].name);
            // Upload de l'image
            $.ajax({
                method: 'POST',
                url: environnement.serviceUrl + "adminUpdateImage" + type.replace(/é/gi, "e") + ".php",
                data : formData,
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false
            }).done(function() {
                $.notify({
                    message: "Upload success"
                }, {
                    type:'info'
                });
            })
        }
    }
}