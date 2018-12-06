/**
 * Objet UI pour créer les bulles de la frise chronologique pour histoire
 * 
 * @param {string} title 
 * @param {string} description 
 * @param {string} images 
 * @param {boolean} line
 */
class BubbleHistory {

    constructor(title, description, codeQuartier, images = "", line=true) {
        this.images = images;
        this.title  = title;
        this.description = description;
        this.codeQuartier = codeQuartier;
        this.line = line;
        this.historisation = null;
    }

    /**
     * Méthode principal de la classe
     * renvoie l'objet du DOM concernant une bulle
     */
    createBubbleHistory() {
        var BubbleHistory = $("<div></div>");   // Création de la div de base
        BubbleHistory.append(this._createBubble()); // On ajoute la bulle avec son image
        BubbleHistory.append(this._createTitle()); // On met un titre
        BubbleHistory.append(this._createDescription()); // on ajoute le texte
        BubbleHistory.append(this._createButton());  // On crée le bouton pour la bulle   
        
        // Création de la ligne si ce n'est pas la dernière bulle
        if(this.line){
            BubbleHistory.append($('<div></div>').addClass("lineTimeline")[0]);
        }

        this.historisation = BubbleHistory;

        return BubbleHistory;
    }
 
    /**
     * Permet de modifier la ou les images de la bulle
     * 
     * @param {string} images
     */
    changeImg(images) {
        this.images = images;
        var classNameBubble= this.historisation.getElementsByClassName("bubble");
        classNameBubble[0].css("background-image","url(" + path[this.codeQuartier]+images + ")");
    }

    /**
     * Permet de modifier le titre de la bulle
     * 
     * @param {string} title 
     */
    changeTitle(title) {
        this.title = title;
        var classNameBubble= this.historisation.getElementsByClassName("titleBubble");
        classNameBubble[0].text(title);
    }

    /**
     * Permet de modifier la description de la bulle
     * 
     * @param {string} description 
     */
    changeDescription(description) {
        this.description = description;
        var classNameBubble= this.historisation.getElementsByClassName("txtBubble");
        classNameBubble[0].text(description);
    }

    /**
     * création de la bulle
     */
    _createBubble(){
       var bubble = $('<div></div>').addClass("bubble");
        if(this.images == "undefined.png") {
            bubble.attr("style","background-image : url(assets/images/core/" + this.images + ")");
        } else {
            bubble.attr("style","background-image : url(" + path[this.codeQuartier] + this.images + ")");
        }
       return bubble[0];
    }

    /**
     * création du titre de la bulle
     */

    _createTitle(){
        var title=$('<h2></h2>').addClass("marginFrise titleBubble").text(this.title);
        return title[0];
    }

    /***
     * création de la description
     */

    _createDescription(){
        var desc=$('<p></p>').addClass("marginFrise text-justify txtBubble");
        if (this.description.length<150){
            desc.text(this.description);
        }
        else{
            var littleTxt=this.description.substr(0,147)+"...";
            desc.text(littleTxt);
        }
        return desc[0];
    }

    /***
     * création du bouton de la bulle
     */

    _createButton(){
       var button=$('<button></button>').addClass("btn btn-primary btnHistory").text("En savoir plus ...") ;

       var that= this;
       button.click(function(){
            $("#blocTxtHistory").fadeOut('fast', function(){
            $("#txtHistory").text(that.description);
            $("#sousTitreHistory").text(that.title);
            $("#imgHistory").css('display', 'inline-block');
            $("#imgHistory").css('background-image', 'url(' + path[that.codeQuartier]+that.images + ')');
            $("#blocTxtHistory").fadeTo('fast', 1);
        });
        setTimeout(function(){ 
            location.href="#bodyHistoire";
        }, 100);
       });

       return button[0];
    }
}