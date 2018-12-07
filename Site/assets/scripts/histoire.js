var tabHistory= new Array();

$.ajax({
    method: "GET",
    url: environnement.serviceUrl + "getHistoireByQuartier.php?quartier=" + quartier[idQuartier]
}).done(function(data) {
    for (let histoire of data){
        tabHistory.push(new BubbleHistory(histoire.titre, histoire.commentaire, idQuartier, histoire.image));
    }
    tabHistory[0].showTxt(tabHistory[0]);
    let last = data[data.length - 1];
    tabHistory.pop();
    tabHistory.push(new BubbleHistory(last.titre, last.commentaire, idQuartier, last.image, false));
    addBubbleInTimeline(tabHistory,$("#timelineHistory"));
});

/* Crée la timeline avec un tableau de bulle et le container de la timeline*/
function addBubbleInTimeline(tabBubble,container){
    for (var i=0; i<tabBubble.length; i++){
        container.append(tabBubble[i].createBubbleHistory());
    }
}