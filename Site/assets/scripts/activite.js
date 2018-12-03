/**** PARTIE ACTIVITE ******/

/* INIT */

setTimeout(function () {
    $.ajax({
        method: "GET",
        url: environnement.serviceUrl + "getActiviteByQuartier.php?quartier=" + quartier[idQuartier]
      })
      .done(function(data){
        updateActivite(data);
        activitePanelSnapInstance = new PanelSnap(activiteOptions);
        activitePanelSnapInstance.on("snapStop", checkEnability);
        initSectionButtonClick();
      });
}, 1000);

/* DATAS */

const activiteSectionStructure = '<section data-panel=""><h2 class="row no-margin mb-4"></h2><div class="row"><p class="col-8 mr-4 hide"></p><div class="col-3 img-fluid imageActivite hide"></div></div><div class="expandbutton"><a>▽</a></div></section>';

function updateActivite(data) {
    buildActiviteSectionStructure(data.length);
    $("#activiteconteneur > section").each(function( index ) {
        $(this).children("h2").text(data[index]["titre"]);
        $(this).find("p").text(data[index]["commentaire"]);
        $(this).find(".imageActivite").css('background', 'url(' + path[data[index].codeQuartier] + data[index].image + ') no-repeat');
    });
}

function buildActiviteSectionStructure(size){
    for (let i = 1; i < size + 1; i++) {
        $("#activiteconteneur").append(activiteSectionStructure);
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
            activitePanelSnapInstance.enable();
            section.toggleClass("sectionexpanded");
    
            $("#activiteconteneur").css({ overflow: "scroll", "overflow-x": "hidden"});
            $(this).toggleClass("arrowup");
            section.animate({ height: "50%" }, 350)
            section.find("p").animate({ height: "65%" }, 350)
            section.find("p").toggleClass("hide", 350);
            section.find(".imageActivite").toggleClass("hide", 350);
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
            section.find(".imageActivite").toggleClass("hide", 350);
        }
        activitePanelSnapInstance.snapToPanel(section[0]);
    });
}


function checkEnability(){
    if (isExtend) {
        activitePanelSnapInstance.disable();
    }
}

/* PANELSNAP */

var activitePanelSnapInstance;
var activiteContainer = $("#activiteconteneur")[0];

var activiteOptions = {
    container: activiteContainer,
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
    activitePanelSnapInstance.snapToPanel(panelToSnap);
}

function getSectionCount() {
    return $("#activiteconteneur > section").length;
}

function getActivateNumber() {
    return activitePanelSnapInstance.activePanel.getAttribute("data-panel");
}
