/**
 * Objet Card (UI), permet de créer et modifier des cartes
 * Utilise les classes Bootstrap "Card"
 * /!\ Permet de générer l'objet DOM Leaflet pas le contrôle
 * 
 * @param {string} title 
 * @param {string} description 
 * @param {string | Array[string]} images 
 */
class Card {    
    constructor(title, description, adresse = "", numero = "", codeQuartier, images = "", link = "") {
        this.images = images;
        this.link = link;
        this.title  = title;
        this.codeQuartier = codeQuartier;
        this.description = description;
        this.adresse = adresse;
        this.numero = numero;
        this.button=null;
    }

    /**
     * Méthode principal de la classe
     * Permet de générer la carte suivant les paramètres de l'objet et renvoie le dom créé dans un fonction
     * A ajouter a l'evenement "onAdd" des contrôles Leaflet
     */
    createCard() {
        var mapCard = L.DomUtil.create("div", "card legend border-light"); // Création de la div de base
        try {
            mapCard.append(this._createImgCard()); // On ajoute la ou les images de la carte
        } catch(CardException) {
            return CardException;
        }
        mapCard.append(this._createCoreCard()); // On termine la génération en ajoutant le titre et la description puis le lien
        return function() {
            return mapCard;
        };
    }

    /* permet de créer une carte sans l'associer à la maps*/
    createSimpleCard(){
        var mapCard =$("<div></div>");   // Création de la div de base
        mapCard.addClass("card legend border-light");
        mapCard.append(this._createImgCard());                        // On ajoute la ou les images de la carte
        mapCard.append(this._createCoreCard()); 
        return mapCard;
    }
 
    /**
     * Permet de modifié la ou les images de la carte
     * 
     * @param {string | Array[string]} images
     */
    changeImg(images) {
        this.images = images;
        this._createImgCard();
    }

    /**
     * Permet de modifier le titre de la carte
     * 
     * @param {string} title 
     */
    changeTitle(title) {
        this.title = title;
        this._createCoreCard();
    }

    /**
     * Permet de modifier la description de la carte
     * 
     * @param {string} description 
     */
    changeDescription(description) {
        this.description = description;
        this._createCoreCard();
    }

    /**
     * Permet de modifier la description de la carte
     * 
     * @param {string} adresse 
     */
    changeDescription(adresse) {
        this.adresse = adresse;
        this._createCoreCard();
    }

    /**
     * Permet de modifier la description de la carte
     * 
     * @param {string} numero 
     */
    changeDescription(numero) {
        this.telephone = numero;
        this._createCoreCard();
    }

    /**
     * Constructeur du haut de la carte contenant l'image ou le slider
     */
    _createCoreCard() {
        var coreCard = "";
        coreCard = $("<div></div>", {
            class: "card-body"
        });
        var title = $("<h5></h5>", {
            class: "card-title"
        }).attr("title", this.title);
        title.append(this.title);
        var text = $("<p></p>", {
            class: "card-text"
        }).attr("title", this.description);
        text.append(this.description);

        var footerCard="";
        footerCard=$("<div></div>",{
            class:"card-footer bg-transparent"
        });

        var link = $("<a></a>", {
            class: "btn btn-primary btn-block"
        });
        if(this.link === "")
            link.attr("href", "?page=" + quartier[this.codeQuartier]);
        else
            link.attr("href", "?page=" + quartier[this.codeQuartier] + this.link);
        link.append("En savoir plus");
        this.button=link;
        coreCard.prepend(title);
        coreCard.append(text);
        footerCard.append(link);
        coreCard.append(footerCard);
        return coreCard[0];
    }

    /**
     * Constructeur du corp de la carte contenant le titre et la desciption
     */
    _createImgCard() {
        if (Array.isArray(this.images)) {
            if (this.images.length < 2) {
                throw new CardException("Error - images should contain more then 1 element");
            }
            var imageCard = $("<div></div>", {
                class: "carousel slide carousel-fade"
            }).attr("data-ride", "carousel");
            var carousel = $("<div></div>", {
                class: "carousel-inner"
            });
            imageCard.append(carousel);
            for (let imagePath of this.images) {
                let div = $("<div></div>", {
                    class: "carousel-item"
                });
                let image = $("<img>", {
                    class: "d-block w-100"
                }).attr("src", path[this.codeQuartier]+imagePath);
                div.append(image);
                carousel.append(div);
            }
            carousel.children(":first-child").addClass("active");
            imageCard.carousel();
        } else {
            if(this.images == "undefined") {
                var imageCard = $("<img>", {
                    class: "card-img-top d-block w-100"
                }).attr("src", 'assets/images/core/' + this.images + ".png");
            } else {
                var imageCard = $("<img>", {
                    class: "card-img-top d-block w-100"
                }).attr("src", path[this.codeQuartier]+this.images);
            }
        }
        return imageCard[0];
    }

    /** 
     * Création d'un evt sur le bouton
     */
    createButtonEvt(idEvt){
        this.button.attr("href","#"+idEvt);
        var that=this;
        this.button.click(function(){
            $("#"+idEvt).css("display","inline-block");
            $("#"+idEvt+" .imgSavoirPlus").css("background-image","url("+path[that.codeQuartier]+that.images+")");
            $("#"+idEvt+" .txtSavoirPlus .titreSavoirPlus").text(that.title);
            $("#"+idEvt+" .txtSavoirPlus .descSavoirPlus").text(that.description);
            $("#"+idEvt+" .contactSavoirPlus .adresseSavoirPlus").text(that.adresse);
            $("#"+idEvt+" .contactSavoirPlus .telephoneSavoirPlus").text(that.numero);
            $("#"+idEvt+" .contactSavoirPlus .telephoneSavoirPlus").attr("href", "tel:" + that.numero);
        });
    }

    /**
     * Création de la div en savoir plus si nous ne sommes pas en mode mobile;
     */
    setupEnSavoirPlus(idEvt){
        $("#"+idEvt).css("display","inline-block");
        $("#"+idEvt+" .imgSavoirPlus").css("background-image","url("+path[this.codeQuartier]+this.images+")");
        $("#"+idEvt+" .txtSavoirPlus .titreSavoirPlus").text(this.title);
        $("#"+idEvt+" .txtSavoirPlus .descSavoirPlus").text(this.description);
    }

    /**
     * Création de la modale en savoir plus si nous somme en mode mobile;
     */
    setupModalEnSavoirPlus(idEvt){
        var modal = $('#mobileModal').find('.modal-body'); // On récupère la modal du template
        modal.empty();  // On vide la modal
        modal.html(card); // Mise à jour de la modal
        $('#mobileModal').modal({show: true}); // Affichage de la modal
    }
}