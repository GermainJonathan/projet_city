/**** PARTIE RESTAURANT ******/

var tabRestaurants=new Array();

for (var i=0; i<7; i++){
    tabRestaurants.push(new Card("Card "+i,"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.",environnement.codePage,"bellecour.jpg"));    
}

CreateContainerRestaurants(tabRestaurants);

/** création dun container pour le restaurant */
function CreateContainerRestaurants(tabRestaurants){
    for (var i=0; i<tabRestaurants.length;i++){
        var card=tabRestaurants[i].createSimpleCard();
        tabRestaurants[i].createButtonEvt("SavoirPlusRestaurants");
        card.addClass(" cardRestaurant");
        $("#RestaurantCards").append(card);
    }

    $("#arrowTopRestaurant").click(function(){
        setTimeout(function(){ 
            location.href="#anchorBodyRestaurants";
        }, 1000);
        $("#RestaurantCards").css("height","350px");
        if($("#rowSavoirPlus").css("height")=="0px"){
            $("#ctnRestaurants").css("height","100%");
        }
        else
            $("#ctnRestaurants").css("height","50%");
    });

    $("#arrowDownRestaurant").click(function(){
        setTimeout(function(){ 
            location.href="#ArrowRes";
            if($("#rowSavoirPlus").css("height")=="0px"){
                var cardRestaurant= $(".cardRestaurant")[0];
                $(cardRestaurant).find(".btn-primary").click();
            }
        }, 700);
        $("#RestaurantCards").css("height","calc(100% - 100px)");
        $("#ctnRestaurants").css("height","75%");
       
    });
}