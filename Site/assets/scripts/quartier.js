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

addBubbleInTimeline(tabHistory,$("#timelineHistory"));

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
    tabMonument.push(new Card("Card "+i,"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.",2,"bellecour.jpg"));    
}
CreateCarousel(tabMonument);

 // Création du carrousel
 function CreateCarousel(tabMonuments){

    var lengthCaroussel=GetLengthCaroussel();

    for (var i=0; i<tabMonuments.length;i++){
        var card=tabMonuments[i].createSimpleCard();
        tabMonuments[i].createButtonEvt("SavoirPlusMonuments");
        card.addClass("cardMonument");
        if(i==0){
            card.addClass("active-left");
        }
        if(i==lengthCaroussel-1){
            card.addClass("active-right");
        }
        if(i>=lengthCaroussel){
            card.addClass("cache");
        }
        $("#carrouselMonument").append(card);
    }

    if(tabMonuments.length<=lengthCaroussel){
        $("#arrowLeftMonument").css("display","none");
        $("#arrowRightMonument").css("display","none");

    }

    putEventsCaroussel();
 }

 // Retourne la taille du caroussel suivant la taille de la fenêtre
 function GetLengthCaroussel(){
    if(window.innerWidth>1920)
        return 5;
    else if(window.innerWidth>1600)
        return 4;
     else if(window.innerWidth>992)
        return 3;
    else if(window.innerWidth>510)
        return 2;
    else 
        return 1;
 }
 
// Ajout d'évènements au caroussel
function putEventsCaroussel(){
    var _lengthCarousel=GetLengthCaroussel();

    window.onresize=function(){
        setTimeout(function(){
            _lengthCarousel=GetLengthCaroussel();
            MakeCarroussel(_lengthCarousel); 
        }, 1000);
       
    }
    
    // clic sur la fèche de gauche 
    $("#arrowLeftMonument").click(function(){
        var cards=$(".cardMonument");
        var activeLeft =$(".cardMonument.active-left");
        var activeRight=$(".cardMonument.active-right");
        if(cards[0]!==activeLeft[0]){
            activeRight.removeClass("active-right");
            activeRight.addClass("cache");
            activeRight.prev().addClass("active-right");
            activeLeft.removeClass("active-left");
            activeLeft.prev().removeClass("cache");
            activeLeft.prev().addClass("active-left");
        }
    });

    // clic sur la flèche de droite
    $("#arrowRightMonument").click(function(){
        var cards=$(".cardMonument");
        var length=cards.length;
        var activeLeft =$(".cardMonument.active-left");
        var activeRight=$(".cardMonument.active-right");
        if(cards[length-_lengthCarousel]!==activeLeft[0]){
            activeLeft.removeClass("active-left");
            activeLeft.addClass("cache");
            activeLeft.next().addClass("active-left");
            activeRight.next().removeClass("cache");
            activeRight.removeClass("active-right");
            activeRight.next().addClass("active-right");
        }
    });

    //  appuie sur les touches du clavier
    $(document).keydown(function(e) {
        if (e.keyCode==39)
            $("#arrowRightMonument").click();
        if(e.keyCode==37)
            $("#arrowLeftMonument").click();
    });
}

/* création du carroussel lors d'un resize */
function MakeCarroussel(lengthCaroussel){

    var cards=$(".cardMonument");
    cards.addClass("cache");
    var activeLeft =$(".cardMonument.active-left");
    var activeRight=$(".cardMonument.active-right");
    activeLeft.removeClass("cache");
    activeRight.removeClass("active-right");
    var i=0;
    var next=activeLeft;
    var noFind=false;
    while(i<(lengthCaroussel-1) && noFind==false){
        var temp=next.next();
        if(temp.length!=0){
            temp.removeClass("cache");
            next=temp;
            i++;
        }
        else{
            next.addClass("active-right");
            noFind=true;
        }
    }

    next.addClass("active-right");

    if (noFind){
        var temp2=activeLeft.prev();
        temp2.removeClass("cache");
        temp2.addClass("active-left");
        activeLeft.removeClass("active-left");
        j=i+1;
        var prev=temp2;
        while(j<(lengthCaroussel-1)){
            var temp3=prev.prev();
            prev.removeClass("active-left");
            temp3.removeClass("cache");
            temp3.addClass("active-left");
            j++;
        }
    }
}


 /**** RESTAURANT PARTIE ******/

 var tabRestaurants=new Array();

for (var i=0; i<7; i++){
    tabRestaurants.push(new Card("Card "+i,"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.",2,"bellecour.jpg"));    
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