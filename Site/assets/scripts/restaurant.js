/**** PARTIE RESTAURANT ******/

var tabRestaurants=new Array();
// Récupération des données
$.ajax({
    method: "GET",
    url: environnement.serviceUrl + "getRestaurantByQuartier.php?quartier=" + quartier[idQuartier]
    }).done(function(data) {
        for (let restaurant of data){
            tabRestaurants.push(new Card(restaurant.nom, restaurant.commentaire, restaurant.codeQuartier,
                 restaurant.image, restaurant.adresse, restaurant.numero)); 
        }
        CreateContainerRestaurants(tabRestaurants);
    });

/** création dun container pour le restaurant */
function CreateContainerRestaurants(tabRestaurants){
    for (var i=0; i<tabRestaurants.length;i++){
        var card=tabRestaurants[i].createSimpleCard();
        tabRestaurants[i].createButtonEvt("SavoirPlusRestaurants");
        card.addClass(" cardRestaurant");
        $("#RestaurantCards").append(card);
    }

    // evènements sur le clic de la flèche du haut
    $("#arrowTopRestaurant").click(function(){
        // On retourne en haut
        setTimeout(function(){ 
            location.href="#anchorBodyRestaurants";
        }, 200);
        $("#RestaurantCards").css("height","365px");
        if($("#rowSavoirPlus").css("height")=="0px"){
            $("#ctnRestaurants").css("height","100%");
        }
        else
            $("#ctnRestaurants").css("height","50%");
    });

    $("#arrowDownRestaurant").click(function(){
        // On va en bas
        setTimeout(function(){ 
            location.href="#ArrowRes";
            if($("#rowSavoirPlus").css("height")=="0px"){
                var cardRestaurant= $(".cardRestaurant")[0];
                $(cardRestaurant).find(".btn-primary").click();
            }
        }, 200);
        $("#RestaurantCards").css("height","calc(100% - 100px)");
        $("#ctnRestaurants").css("height","75%");
       
    });
}