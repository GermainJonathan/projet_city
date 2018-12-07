/**** PARTIE ACTIVITE ******/

/* INIT */

setTimeout(function () {
    $.ajax({
        method: "GET",
        url: environnement.serviceUrl + "getActiviteByQuartier.php?quartier=" + quartier[idQuartier]
      })
      .done(function(data){
        updateActivite(data);
        panelSnapInstance = new PanelSnap(options);
        panelSnapInstance.on("snapStop", checkEnability);
        initSectionButtonClick();
      });
}, 1000);

/* DATAS */

const sectionStructure = '<section class="panelActivite" data-panel=""><h2 class="row no-margin mb-4"></h2><div class="row activiteContent"><p class="col-8 mr-4 hide"></p><div class="col-3 img-fluid imageActivite hide"></div></div><div class="expandbutton"><a>▽</a></div></section>';

function updateActivite(data) {
    buildSectionStructure(data.length);
    $("#activiteconteneur > section").each(function( index ) {
        $(this).children("h2").text(data[index]["titre"]);
        $(this).find("p").text(data[index]["commentaire"]);

        if(data[index]["nomLieux"] !="" && data[index]["nomLieux"] !=null ){
            var adresse=$('<div class="adresseActivite"><span class="mapicon"></span><div class="AdresseActiviteTxt">'+data[index]["nomLieux"]+'</div></div>');
            $(this).find("p").append(adresse);
        }
        if(data[index]["telephone"]!=""&&data[index]["telephone"]!=null){
            var tel=$('<div class="telActivite"><span class="telicon"></span><div class="TelActiviteTxt">'+data[index]["telephone"]+'</div></div>');
            $(this).find("p").append(tel);
        }
        
        $(this).find(".imageActivite").css('background', 'url(' + path[data[index].codeQuartier] + data[index].image + ') no-repeat');
    });

    if(idQuartier== 1){
        $("#imgActivitePrincipale").css("background-image","url('assets/images/perrache/gare-perrache.jpg')");
    }
    else if (idQuartier ==2){
        $("#imgActivitePrincipale").css("background-image","url('assets/images/bellecour/grande-roue.jpg')");
    }
    else if(idQuartier ==3){
        $("#imgActivitePrincipale").css("background-image","url('assets/images/terreaux/opera.jpg')");
    }
}

function buildSectionStructure(size){
    for (let i = 1; i < size + 1; i++) {
        $("#activiteconteneur").append(sectionStructure);
        $("#activiteconteneur > section").last().attr("data-panel", i);
    }
}

/* EXTENDING ACTION */

var isExtend = false;

function initSectionButtonClick(){
    $(".expandbutton > a").click(function () {
        var section = $(this).parents("section");
    
        if (section.hasClass('sectionexpanded')) //retract
        {
            isExtend = false;
            panelSnapInstance.enable();
            section.toggleClass("sectionexpanded");
    
            $("#activiteconteneur").css({ overflow: "scroll", "overflow-x": "hidden"});
            $(this).toggleClass("arrowup");
            section.animate({ height: "50%" }, 350)
            section.find("p").animate({ height: "65%" }, 350)
            section.find("p").toggleClass("hide", 350);
            section.find("p").removeClass("ImgOpacityGrande");
            section.find(".imageActivite").toggleClass("hide", 350);
            section.find(".imageActivite").css('opacity', '.7');
        }
        else //expand
        {
            isExtend = true;
            section.toggleClass("sectionexpanded");
    
            $("#activiteconteneur").css({ overflow: "hidden"});
            $(this).toggleClass("arrowup");
            section.animate({ height: "100%" }, 350);
            section.find("p").animate({ height: "100%" }, 350);
            section.find("p").toggleClass("hide", 350);
            section.find("p").addClass("ImgOpacityGrande");
            section.find(".imageActivite").toggleClass("hide", 350);
            section.find(".imageActivite").css('opacity', '1');
        }
        panelSnapInstance.snapToPanel(section[0]);
    });
}


function checkEnability(){
    if (isExtend) {
        panelSnapInstance.disable();
    }
}

/* PANELSNAP */

var panelSnapInstance;
var container = $("#activiteconteneur")[0];

var options = {
    container: container,
    slideSpeed: 200,
};

$("#arrowUpActivity").click(function () {
    fluidSnap("up");
});

$("#arrowDownActivity").click(function () {
    fluidSnap("down");
});

function fluidSnap(direction) {
    var panelToSnap;
    if (direction == "up") {
        if (parseInt(getActivateNumber()) == 1) {
            panelToSnap = $("section[data-panel='" + (parseInt(getSectionCount()) - 1) + "']")[0];
        }
        else {
            panelToSnap = $("section[data-panel='" + (parseInt(getActivateNumber()) - 1) + "']")[0];
        }
    }
    else if (direction == "down") {
        if (parseInt(getActivateNumber()) + 1 >= getSectionCount()) {
            panelToSnap = $("section[data-panel='" + 1 + "']")[0];
        }
        else {
            panelToSnap = $("section[data-panel='" + (parseInt(getActivateNumber()) + 1) + "']")[0];
        }
    }
    panelSnapInstance.snapToPanel(panelToSnap);
}

function getSectionCount() {
    return $("#activiteconteneur > section").length;
}

function getActivateNumber() {
    return panelSnapInstance.activePanel.getAttribute("data-panel");
}
