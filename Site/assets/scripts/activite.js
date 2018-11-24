/**** PARTIE ACTIVITE ******/

updateActivite();

function updateActivite() {

}

var panelSnapInstance;
var container = $("#activiteconteneur")[0];

var options = {
    container : container,
    slideSpeed: 200,
};

$("#arrowUpActivity").click(function(){

});

$("#arrowDownActivity").click(function(){
    // panelSnapInstance.snapToPanel($("section[data-panel='2']"));
    // panelSnapInstance.snapToPanel(getActivateNumber() + 1);
});


function getActivateNumber()
{
    return panelSnapInstance.activePanel.getAttribute("data-panel");
}


  setTimeout(function() {
        panelSnapInstance = new PanelSnap(options);
}, 1000);