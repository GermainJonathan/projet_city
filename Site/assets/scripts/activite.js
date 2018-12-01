/**** PARTIE ACTIVITE ******/

/* DATAS */

updateActivite();

function updateActivite() {

}

/* EXTEND ACTION */

var isExtend = false;

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

setTimeout(function () {
    panelSnapInstance = new PanelSnap(options);
    panelSnapInstance.on("snapStop", checkEnability);
}, 1000);