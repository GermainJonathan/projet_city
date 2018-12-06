// Page selectionné (Accueil, Bellecour, etc)
var selectPage = 0;

// Ordre des parges iso au site mais différents dans la suite du codeQuartier
var adminPageOrder = ["", "terreaux", "bellecour", "perrache"];

// Variable de l'ancien type de composant chargé
var oldConfig;
var oldMail;

// Schéma Menu
var listMenu = ["Histoire", "Monument", "Activité", "Restaurant"];

// Liste des composants
var componentsConfig = {
    "Histoire": "patrimoineConfig",
    "Monument": "patrimoineConfig",
    "Activité": "patrimoineConfig",
    "Restaurant": "patrimoineConfig"
};
// Initialisation
selectPage = 1;
generateList(listMenu);

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
    if(selectPage == 4) {
        $("#patrimoineConfig").hide();
        $(".adminContainer > .spinner:first").show();
        mailWatcher();
    } else {
        $("#administrationConfig").hide();
        $("#patrimoineConfig").show();
        generateList(listMenu);
    }
});

/**
 * Génèration des menus et recupération des données existantes
 * @param {*} list 
 */
function generateList(list) {
    $("div.sidebarAdmin").empty();
    for(let elem in list) {
        let item = $("<a class='nav-link' id='v-pills-settings-tab' data-toggle='pill'" + "data-index=" + elem + " data-toload='" + componentsConfig[list[elem]] + "' href='#' role='tab' aria-selected='false'>" + list[elem] + "</a>");
        $("div.sidebarAdmin").append(item);
    }
    $("div.sidebarAdmin").children(":first").addClass("active show");
    /**
     * Fonction au click sur un lien dans le menu
     */
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
                        $.ajax({
                            url: path[patrimoine.codeQuartier] + patrimoine.image,
                            type: 'HEAD',
                        }).fail(function () {
                            addPatrimoineComponents(patrimoine, false);
                        }).done(function() {
                            addPatrimoineComponents(patrimoine, true);
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

// Ajout un composant patrimoine et lui associe un id en html
function addPatrimoineComponents(patrimoine, imageChange = true) {
    let typeComponent = listMenu[$(".sidebarAdmin>a.nav-link.active").data("index")];
    let lastIndex = parseInt($("#patrimoineContent").find(".media").last().attr('id'));
    let content = $("#patrimoineContent").find(".media").first();
    content.clone().appendTo($("#patrimoineContent"));
    $("#patrimoineContent").find(".media").last().attr('id', lastIndex +1);
    $("#patrimoineContent").find(".media").last().show();
    let newComponent =  $("#patrimoineContent").find(".media").last();
    if(!imageChange) {
        newComponent.find("img.imgAdmin").attr('src', "/assets/images/core/undefined.png");
    } else {
        newComponent.find("img.imgAdmin").attr('src', path[patrimoine.codeQuartier] + patrimoine.image);
    }
    updateComponent(typeComponent, newComponent, patrimoine);
}

/**
 * Génère des inputs en fonction du type de composant et association des données dans les formulaires de saisie
 * 
 * @param {*} typeComponent 
 * @param {*} component 
 * @param {*} dataComponent 
 */
function updateComponent(typeComponent, component, dataComponent) {
    switch(typeComponent) {
        case "Histoire":
            component.find("#id").val(dataComponent.id);
            component.find("#title").val(dataComponent.titre);
            component.find("#description").val(dataComponent.commentaire);
            break;
        case "Monument":
            component.find("#id").val(dataComponent.id);
            component.find("#title").val(dataComponent.libelleMonument);
            component.find("#description").val(dataComponent.commentaire);
            let architecte = $("<div class='form-inline' data-id='2'><label class='col-2 align-self-left' for='archi'><h4 class='text-truncate'>Architecte</h4></label><input name='architecte' type='text' class='form-control col-8' id='archi'></div>");
            architecte.find("#archi").val(dataComponent.architecte);
            architecte.appendTo(component.find(".media-body"));
            let coordonneesMonument = $("<div class='form-inline' data-id='8'><label class='col-2 align-self-left' for='coordonnees'><h4 class='text-truncate'>Coordonnées</h4></label><input name='coordonneesX' type='number' step='0.000001' class='form-control mr-4' id='x'><input name='coordonneesY' type='number' step='0.00000000000001' class='form-control' id='y'></div>");
            if(dataComponent.coordonnees) {
                coordonneesMonument.find("#x").val(dataComponent.coordonnees.x);
                coordonneesMonument.find("#y").val(dataComponent.coordonnees.y);
            }
            coordonneesMonument.appendTo(component.find(".media-body"));
            let adresseMonument = $("<div class='form-inline' data-id='9'><label class='col-2 align-self-left' for='adresseMonument'><h4 class='text-truncate'>Adresse</h4></label><input name='adresseMonument' type='text' class='form-control col-8' id='adresseMonument'></div>");
            adresseMonument.find("#adresseMonument").val(dataComponent.adresse);
            adresseMonument.appendTo(component.find(".media-body"));
            break;
        case "Activité":
            component.find("#id").val(dataComponent.id);
            component.find("#title").val(dataComponent.titre);
            let coordonneesActivité = $("<div class='form-inline' data-id='8'><label class='col-2 align-self-left' for='coordonnees'><h4 class='text-truncate'>Coordonnées</h4></label><input name='coordonneesX' type='number' step='0.000001' class='form-control mr-4' id='x'><input name='coordonneesY' type='number' step='0.00000000000001' class='form-control' id='y'></div>");
            if(dataComponent.coordonnees) {
                coordonneesActivité.find("#x").val(dataComponent.coordonnees.x);
                coordonneesActivité.find("#y").val(dataComponent.coordonnees.y);
            }
            coordonneesActivité.appendTo(component.find(".media-body"));
            component.find("#description").val(dataComponent.commentaire);
            break;
        case "Restaurant":
            component.find("#id").val(dataComponent.id);
            component.find("#title").val(dataComponent.nom);
            component.find("#description").val(dataComponent.commentaire);
            let coordonneesRestaurant = $("<div class='form-inline' data-id='8'><label class='col-2 align-self-left' for='coordonnees'><h4 class='text-truncate'>Coordonnées</h4></label><input name='coordonneesX' type='number' step='0.000001' class='form-control mr-4' id='x'><input name='coordonneesY' type='number' step='0.00000000000001' class='form-control' id='y'></div>");
            if(dataComponent.coordonnees) {
                coordonneesRestaurant.find("#x").val(dataComponent.coordonnees.x);
                coordonneesRestaurant.find("#y").val(dataComponent.coordonnees.y);
            }
            let telephone = $("<div class='form-inline' data-id='2'><label class='col-2 align-self-left' for='tel'><h4 class='text-truncate'>Telephone</h4></label><input name='telephone' type='text' class='form-control col-8' id='tel'></div>");
            telephone.find("#tel").val(dataComponent.numero);
            let adresse = $("<div class='form-inline' data-id='3'><label class='col-2 align-self-left' for='adresse'><h4 class='text-truncate'>Adresse</h4></label><input name='adresse' type='text' class='form-control col-8' id='adresse'></div>");
            adresse.find("#adresse").val(dataComponent.adresse);
            coordonneesRestaurant.appendTo(component.find(".media-body"));
            telephone.appendTo(component.find(".media-body"));
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

/**
 * Génération des formats de données à renvoyer
 * @param {*} patrimoine 
 * @param {*} type 
 */
function generateFormData(patrimoine, type) {
    let data = {};
    switch(type) {
        case "Histoire":
            data = {
                'idHistoire' : patrimoine[0].value,
                'codeQuartier' : adminPageOrder[selectPage],
                'description' : patrimoine[2].value,
                'title' : patrimoine[1].value
            }
            break;
        case "Monument":
            data = {
                'idMonument' : patrimoine[0].value,
                'codeQuartier' : adminPageOrder[selectPage],
                'description' : patrimoine[6].value,
                'architecte' : patrimoine[2].value,
                'title' : patrimoine[1].value,
                'coordonnees' : "POINT(" + patrimoine[3].value + " " + patrimoine[4].value + ")",
                'adresse' : patrimoine[5].value,
            }
            break;
        case "Activité":
            data = {
                'idActivite' : patrimoine[0].value,
                'codeQuartier' : adminPageOrder[selectPage],
                'description' : patrimoine[4].value,
                'coordonnees' : "POINT(" + patrimoine[2].value + " " + patrimoine[3].value + ")",
                'title' : patrimoine[1].value
            }
            break;
        case "Restaurant":
            data = {
                'idRestaurant' : patrimoine[0].value,
                'codeQuartier' : adminPageOrder[selectPage],
                'description' : patrimoine[6].value,
                'telephone' : patrimoine[2].value,
                'adresse' : patrimoine[3].value,
                'title' : patrimoine[1].value,
                'coordonnees' : "POINT(" + patrimoine[4].value + " " + patrimoine[5].value + ")",
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

/**
 * Action au click du bouton enregistrer
 */
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
    var type = listMenu[$(".sidebarAdmin>a.nav-link.active").data("index")];
    
    for(let i = 0; i < objects.length; i++) {
        let data = generateFormData(objects[i], type);
        if(data.coordonnees === "POINT( )") {
           data.coordonnees = "POINT(0 0)"; 
        }
    //------------------Création des objets-----------------------
        if(objects[i][0].value == "") {
            $.ajax({
                method: 'POST',
                url: environnement.serviceUrl + "adminCreate" + type.replace(/é/gi, "e") + ".php",
                data : JSON.stringify(data),
                contentType : 'application/json'
            }).done(function(data) {
                $.notify({
                    message: "Object create with id : " + data.id
                }, {
                    type:'success'
                });
                objects[i][0].value = data.id;
                //-----------------Upload de l'image-------------------
                uploadImage(images, objects, i, type);
                if(i == objects.length - 1) {
                    $(".contentAdmin > .spinner").hide();
                    $("#patrimoineConfig").show();
                }
            });
        } else {
        //------------------Modification des objets--------------------
            //-------------Mise à jour des champs-------------------
            $.ajax({
                method: 'POST',
                url: environnement.serviceUrl + "adminUpdateDescription" + type.replace(/é/gi, "e") + ".php",
                data : JSON.stringify(data),
                contentType : 'application/json'
            }).done(function(data) {
                $.notify({
                    message: "Object update with id : " + data.id
                }, {
                    type:'success'
                });
                //-----------------Upload de l'image-------------------
                uploadImage(images, objects, i, type);
                if(i == objects.length - 1) {
                    $(".contentAdmin > .spinner").hide();
                    $("#patrimoineConfig").show();
                }
            });
        }
    }
}

/**
 * Permet d'upload l'image
 * 
 * @param {*} images 
 * @param {*} objects 
 * @param {*} i 
 * @param {*} type 
 */
function uploadImage(images, objects, i, type) {
    if(images[i]) {
        var formData = new FormData();
        formData.append('id', objects[i][0].value);
        formData.append('image', images[i], images[i].name);
        $.ajax({
            method: 'POST',
            url: environnement.serviceUrl + "adminUpdateImage" + type.replace(/é/gi, "e") + ".php",
            data : formData,
            cache: false,
            dataType: 'json',
            processData: false,
            contentType: false
        }).done(function(data) {
            $.notify({
                message: "Image upload success with id : " + data.id
            }, {
                type:'success'
            });
        })
    }
}

function openModal(ObjectId) {
    $('#adminModal').modal('show');
    $('#adminModal').find("input#idModal").val(ObjectId);
}

function deleteObject(ObjectId) {
    $('#adminModal').modal('hide');
    let type = listMenu[$(".sidebarAdmin>a.nav-link.active").data("index")];
    $.ajax({
        method: 'GET',
        url: environnement.serviceUrl + "adminDelete" + type.replace(/é/gi, "e") + ".php?id=" + ObjectId
    }).done(function () {
        $.notify({
            message: "Object deleted with id : " + ObjectId
        }, {
            type:'success'
        });
        $("form > input#id").each(function() {
            if($(this).val() == ObjectId) {
                $(this).parent().hide();
            }
        });
    }).fail(function() {
        $.notify({
            message: "Error on delete object with id : " + ObjectId
        }, {
            type:'warning'
        });
    });
}

function mailWatcher() {
    $("div.sidebarAdmin").empty();
    generateMailingList();
    $("#administrationConfig").show();
}

function generateMailingList() {
    $("#sidebarData > input").each(function() {
        let mail = $("<p class='row inline'><a class='btn btn-light col-10 mailObject' onClick='openMail(" + $(this).data("idmessage") + ");'>" + $(this).val() + "</a><button type='button' class='btn btn-outline-danger col-2' onClick='modalDeleteMail(" + $(this).data('idmessage') + ");'><span class='bin'></span></button></p>");
        $("div.sidebarAdmin").append(mail);
    });
    $(".adminContainer > .spinner:first").hide();
}

function openMail(idMessage) {
    if(oldMail == undefined) {
        $("#mailContent > div#" + idMessage).show();
        oldMail = idMessage;
    } else {
        $("#mailContent > div#" + oldMail).hide();
        $("#mailContent > div#" + idMessage).show();
        oldMail = idMessage;
    }
}

function modalDeleteMail(idMessage) {
    $('#adminModalMail').modal('show');
    $('#adminModalMail').find("input#idModal").val(idMessage);
}

function deleteMail(idMessage) {
    $('#adminModal').modal('hide');
    $.ajax({
        method: 'GET',
        url: environnement.serviceUrl + "adminDeleteMessageContact.php?id=" + idMessage
    }).done(function () {
        $.notify({
            message: "Message deleted with id : " + idMessage
        }, {
            type:'success'
        });
        $("form > input#id").each(function() {
            if($(this).val() == idMessage) {
                $(this).parent().hide();
            }
        });
    }).fail(function() {
        $.notify({
            message: "Error on delete message with id : " + idMessage
        }, {
            type:'warning'
        });
    });
}