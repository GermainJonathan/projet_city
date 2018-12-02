/**** PARTIE ACTIVITE ******/

var panelSnapInstance;
var container = $("#activiteconteneur")[0];

var options = {
    container : container,
    slideSpeed: 200,
};

$("#arrowUpActivity").click(function(){
    fluidSnap("top");
});

$("#arrowDownActivity").click(function(){
    fluidSnap("bottom");
});

$.ajax({
    method: "GET",
    url: environnement.serviceUrl + "getActiviteByQuartier.php?quartier=" + quartier[idQuartier]
}).done(function(data) {
    console.log(data);
    for (let activite of data){
        //TODO: Générer les élements avec les infos reçu de l'API
    }
    // Suite du code ici
});

function fluidSnap(direction)
{
    var panelToSnap;
    if (direction == "top") 
    {
        if (parseInt(getActivateNumber()) == 1) {
            panelToSnap = $("section[data-panel='" + (parseInt(getSectionCount()) - 1) + "']")[0];
        }
        else
        {
            panelToSnap = $("section[data-panel='" + (parseInt(getActivateNumber()) - 1) + "']")[0];
        }
    }
    else if(direction == "bottom")
    {
        if (parseInt(getActivateNumber()) + 1 >= getSectionCount()) {
            panelToSnap = $("section[data-panel='" + 1 + "']")[0];
        }
        else
        {
            panelToSnap = $("section[data-panel='" + (parseInt(getActivateNumber()) + 1) + "']")[0];
        }
    }
    panelSnapInstance.snapToPanel(panelToSnap);
}

function getSectionCount()
{
    return $("#activiteconteneur > section").length;
}

function getActivateNumber()
{
    return panelSnapInstance.activePanel.getAttribute("data-panel");
}


setTimeout(function() {
    panelSnapInstance = new PanelSnap(options);
}, 1000);