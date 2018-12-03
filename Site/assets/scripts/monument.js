/**** PARTIE MONUMENT ******/

/* INIT */

setTimeout(function () {
    $.ajax({
        method: "GET",
        url: environnement.serviceUrl + "getMonumentByQuartier.php?quartier=" + quartier[idQuartier]
      })
      .done(function(data){
        updateMonument(data);
        monumentPanelSnapInstance = new PanelSnap(monumentOptions);
        monumentPanelSnapInstance.on("snapStop", checkEnability);
        initSectionButtonClick();
      });
}, 1000);

const MonumentSectionStructure = '<section data-panel=""></section>';

function updateMonument(data) {
    buildMonumentSectionStructure(data.length);
    $("#monumentconteneur > section").each(function( index ) {  
            var card = new Card(data[index].libelleMonument,data[index].commentaire,environnement.codePage,data[index].image)
            $(this).append(card.createSimpleCard());
            card.createButtonEvt("SavoirPlusMonuments");
    });
}

function buildMonumentSectionStructure(size){
    for (let i = 1; i < size + 1; i++) {
        $("#monumentconteneur").append(MonumentSectionStructure);
        $("#monumentconteneur > section").last().attr("data-panel", i);
    }
}


/* PANELSNAP */

var monumentPanelSnapInstance;
var monumentContainer = $("#monumentconteneur")[0];

var monumentOptions = {
    container: monumentContainer,
    slideSpeed: 200,
};
