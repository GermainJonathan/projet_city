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

const sectionStructure = '<section data-panel=""><h2></h2><p class="hide"></p><div class="expandbutton"><a>▽</a></div></section>';

function updateActivite(data) {
    buildSectionStructure(data.length);
    $("#activiteconteneur > section").each(function( index ) {
        $(this).children("h2").text(data[index]["titre"]);
        $(this).children("p").text(data[index]["commentaire"]);
    });
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
            section.children("p").animate({ height: "65%" }, 350)
            section.children("p").toggleClass("hide", 350);
        }
        else //expand
        {
            isExtend = true;
            section.toggleClass("sectionexpanded");
    
            $("#activiteconteneur").css({ overflow: "hidden"});
            $(this).toggleClass("arrowup");
            section.animate({ height: "100%" }, 350)
            section.children("p").animate({ height: "100%" }, 350)
            section.children("p").toggleClass("hide", 350);
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
