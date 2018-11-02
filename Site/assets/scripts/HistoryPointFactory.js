/**
 * Objet UI pour créer les bulles de la frise chronologique pour histoire
 * 
 * @param {string} title 
 * @param {string} description 
 * @param {string} images 
 * @param {boolean} line
 */
class BubbleHistory {

    constructor(title, description, images = "",line=true) {
        this.images = images;
        this.title  = title;
        this.description = description;
        this.line=line;
        this.historisation=null;
    }

    /**
     * Méthode principal de la classe
     * renvoie l'objet du DOM concernant une bulle
     */
    createBubbleHistory() {
        var BubbleHistory = document.createElement("div");   // Création de la div de base
        BubbleHistory.append(this._createBubble());                        // On ajoute la ou les images de la carte
        BubbleHistory.append(this._createTitle());
        BubbleHistory.append(this._createText());
        BubbleHistory.append(this._createButton());  // On termine la génération en ajoutant le titre et la description puis le lien   
        
        this.historisation=BubbleHistory;

        return BubbleHistory;
    }
 
    /**
     * Permet de modifié la ou les images de la carte
     * 
     * @param {string} images
     */
    changeImg(images) {
        this.images = images;
        this._createBubble();
    }

    /**
     * Permet de modifier le titre de la carte
     * 
     * @param {string} title 
     */
    changeTitle(title) {
        this.title = title;
        this._createTitle();
    }

    /**
     * Permet de modifier la description de la carte
     * 
     * @param {string} description 
     */
    changeDescription(description) {
        this.description = description;
        this._createText();
    }

    _createBubble(){
       var bubble=$('<div></div>').addClass("bubble");
       bubble.css("background-image",this.images);
       return bubble;
    }

    _createTitle(){
        var title=$('<h2></h2>').addClass("marginFrise").txt(this.title);
        return title;
    }

    _createDescription(){
        var desc=$('<p></p>').addClass("marginFrise text-justify txtBubble");
        if (this.description.length<200){
            desc.text(this.description);
        }
        else{
            var littleTxt=this.description.substr(0,197)+"...";
            desc.text(littleTxt);
        }
        return desc;
    }

    _createButton(){
       var button=$('<button></button>').addClass("btn btn-primary btnHistory") ;
       button.click(function(){
            $("#txtHistory").text(this.description);
       });
    }

  
}