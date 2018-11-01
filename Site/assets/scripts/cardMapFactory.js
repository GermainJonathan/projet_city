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
    constructor(title, description, images = "") {
        this.images = images;
        this.title  = title;
        this.description = description;
    }

    /**
     * Méthode principal de la classe
     * Permet de générer la carte suivant les paramètres de l'objet et renvoie le dom créé dans un fonction
     * A ajouter a l'evenement "onAdd" des contrôles Leaflet
     */
    createCard() {
        var mapCard = L.DomUtil.create("div", "card legend"); // Création de la div de base
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
        var link = $("<a></a>", {
            class: "btn btn-primary btn-block"
        }).attr("href", "?page=" + this.title.toLowerCase());
        link.append("En savoir plus");
        coreCard.prepend(title);
        coreCard.append(text);
        coreCard.append(link);
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
                }).attr("src", imagePath);
                div.append(image);
                carousel.append(div);
            }
            carousel.children(":first-child").addClass("active");
            imageCard.carousel();
        } else {
            var imageCard = $("<img>", {
                class: "card-img-top d-block w-100"
            }).attr("src", this.images);
        }
        return imageCard[0];
    }
}