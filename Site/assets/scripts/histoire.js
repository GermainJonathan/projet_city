var tabHistory= new Array();

for (var i=0; i<3; i++){
    tabHistory.push(new BubbleHistory("Histoire de mon quartier","texte d'exemple, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", environnement.codePage));    
}
tabHistory.push(new BubbleHistory("Histoire de mon quartier","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", environnement.codePage, "",false));

addBubbleInTimeline(tabHistory,$("#timelineHistory"));

/* Crée la timeline avec un tableau de bulle et le container de la timeline*/
function addBubbleInTimeline(tabBubble,container){
    for (var i=0; i<tabBubble.length; i++){
        container.append(tabBubble[i].createBubbleHistory());
    }
}