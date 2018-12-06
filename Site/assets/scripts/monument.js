/**** CAROUSEL MONUMENTS ******/
var tabMonument=new Array();

$.ajax({
    method: "GET",
    url: environnement.serviceUrl + "getMonumentByQuartier.php?quartier=" + quartier[idQuartier]
}).done(function(data) {
    console.log(data);
    for (let monument of data){
        tabMonument.push(new Card(monument.libelleMonument, monument.commentaire, environnement.codePage,
            monument.image, monument.adresse));    
    }
    CreateCarousel(tabMonument);
});

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
            card.addClass("noVisibility");
        }
        $("#carrouselMonument").append(card);
    }

    if(tabMonuments.length<=lengthCaroussel){
        $("#arrowLeftMonument").css("display","none");
        $("#arrowRightMonument").css("display","none");

    }

    putEventsCaroussel();
    GetWidthCaroussel(lengthCaroussel);
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

 function GetWidthCaroussel(length){
    switch(length){
        case 1:
            $(".cardMonument").css("width","97%");
            break;
        case 2:
            $(".cardMonument").css("width","44%");
            break;
        case 3:
            $(".cardMonument").css("width","30%");
            break;
        case 4:
            $(".cardMonument").css("width","22.5%");
            break;
        case 5:
            $(".cardMonument").css("width","19%");
            break;
    }
 }
 
// Ajout d'évènements au caroussel
function putEventsCaroussel(){
    var _lengthCarousel=GetLengthCaroussel();

    window.onresize=function(){
        setTimeout(function(){
            _lengthCarousel=GetLengthCaroussel();
            MakeCarroussel(_lengthCarousel);
            GetWidthCaroussel (_lengthCarousel);
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
            setTimeout(function(){ activeRight.addClass("noVisibility"); }, 1000);
            activeRight.prev().addClass("active-right");
            activeLeft.removeClass("active-left");
            activeLeft.prev().removeClass("cache");
            activeLeft.prev().removeClass("noVisibility");
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
            setTimeout(function(){ activeLeft.addClass("noVisibility"); }, 1000);
            activeLeft.next().addClass("active-left");
            activeRight.next().removeClass("cache");
            activeRight.next().removeClass("noVisibility");
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
    cards.addClass("noVisibility");
    var activeLeft =$(".cardMonument.active-left");
    var activeRight=$(".cardMonument.active-right");
    activeLeft.removeClass("cache");
    activeLeft.removeClass("noVisibility");
    activeRight.removeClass("active-right");
    var i=0;
    var next=activeLeft;
    var noFind=false;
    while(i<(lengthCaroussel-1) && noFind==false){
        var temp=next.next();
        if(temp.length!=0){
            temp.removeClass("cache");
            temp.removeClass("noVisibility");
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
        temp2.removeClass("noVisibility");
        temp2.addClass("active-left");
        activeLeft.removeClass("active-left");
        j=i+1;
        var prev=temp2;
        while(j<(lengthCaroussel-1)){
            var temp3=prev.prev();
            prev.removeClass("active-left");
            temp3.removeClass("cache");
            temp3.removeClass("noVisibility");
            temp3.addClass("active-left");
            j++;
        }
    }
}