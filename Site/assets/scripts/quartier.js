$(window).scroll(function() {
    if(window.scrollY < 80) {
        $("ul.nav.navbar-nav").children(":first").children(":first").addClass("active");
    }
});
$(function(){
    setTimeout(function() {
        $('html,body').animate({scrollTop:$(location.hash).offset().top}, 500);
    }, 1000);
});

var tabHistory= new Array();

for (var i=0; i<3; i++){
    tabHistory.push(new BubbleHistory("Histoire de mon quartier","texte d'exemple, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.","",true));    
}
tabHistory.push(new BubbleHistory("Histoire de mon quartier","Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.","",false));

addBubbleInTimeline(tabHistory,document.getElementById("timelineHistory"));

/* Crée la timeline avec un tableau de bulle et le container de la timeline*/
function addBubbleInTimeline(tabBubble,container){
    for (var i=0; i<tabBubble.length; i++){
        container.append(tabBubble[i].createBubbleHistory());
    }
}

function smoothScrollingTo(target){
    $('html,body').animate({scrollTop:$(target).offset().top}, 500);
}

/**** CAROUSEL MONUMENTS ******/

var tabMonument=new Array();

for (var i=0; i<7; i++){
    tabMonument.push(new Card("Card "+i,"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.", 3, "terreaux.jpg"));    
}

CreateCarousel(tabMonument);

 // Création du carrousel
 function CreateCarousel(tabMonuments){

    var _lengthCarousel=GetLengthCaroussel();

    for (var i=0; i<tabMonuments.length;i++){
        var card=tabMonuments[i].createSimpleCard();
        card.className+=" cardMonument";
        if(i==0){
            card.className+= " active";
        }
        $("#carrouselMonument").append(card);
    }

    window.onresize=function(){
        _lengthCarousel=GetLengthCaroussel();
    }
    
    // clic sur la fèche de gauche 
    $("#arrowLeftMonument").click(function(){
        var cards=$(".cardMonument");
        var active =$(".cardMonument.active");
        if(cards[0]!==active[0]){
            active.removeClass("active");
            active.next().next().addClass("cache");
            active.prev().addClass("active");
            active.prev().removeClass("cache");
        }
    });

    // clic sur la flèche de droite
    $("#arrowRightMonument").click(function(){
        var cards=$(".cardMonument");
        var length=cards.length;
        var active =$(".cardMonument.active");
        if(cards[length-_lengthCarousel]!==active[0]){
            active.removeClass("active");
            active.addClass("cache");
            active.next().addClass("active");
            active.next().removeClass("cache");
            active.next().next().removeClass("cache");
            active.next().next().next().removeClass("cache");
        }
    });

    $(document).keydown(function(e) {
        if (e.keyCode==39)
            $("#arrowRightMonument").click();
        if(e.keyCode==37)
            $("#arrowLeftMonument").click();
    });
 }

 // Retourne la taille du caroussel suivant la taille de la fenêtre
 function GetLengthCaroussel(){
     if(window.innerWidth>992)
        return 3;
    else if(window.innerWidth>510)
        return 2;
    else return 1;
 }

 /**** RESTAURANT PARTIE ******/

 var tabRestaurants=new Array();

for (var i=0; i<7; i++){
    tabRestaurants.push(new Card("Card "+i,"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.", 3, "terreaux.jpg"));    
}

CreateContainerRestaurants(tabRestaurants);

function CreateContainerRestaurants(tabRestaurants){
    for (var i=0; i<tabRestaurants.length;i++){
        var card=tabRestaurants[i].createSimpleCard();
        card.className+=" cardRestaurant";
        $("#RestaurantCards").append(card);
    }

    $("#arrowTopRestaurant").click(function(){
        $("#RestaurantCards").css("height","300px");
    });

    $("#arrowDownRestaurant").click(function(){
        $("#RestaurantCards").css("height","auto");
    });
}


/*----------------------------------------------------------------------------------*/
/*------------------------------ACTIVITE-------------------------------------------*/


updateActivite();

function updateActivite() {

    // var title = "Title X";
    // var message = `Lorem ipsum dolor sit amet, consectetur adipiscing elit,
    // sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    // Ut enim ad minim veniam, quis nostrud
    // exercitation ullamco laboris nisi ut aliquip
    // ex ea commodo consequat.
    // Lorem ipsum dolor sit amet, consectetur
    // adipiscing elit, sed do eiusmod tempor
    // incididunt ut labore et dolore magna aliqua.
    // Ut enim ad minim veniam, quis nostrud
    // exercitation ullamco laboris nisi ut aliquip
    // ex ea commodo consequat.`;

    // $("#activiteconteneur").append("<div></div>").attr("id","newId");
}