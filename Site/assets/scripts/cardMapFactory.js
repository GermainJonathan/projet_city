/**
 * Objet Card (UI), permet de créer et modifier des cartes
 * Utilise les classes Bootstrap "Card"
 * 
 * @param {string} title 
 * @param {string} description 
 * @param {string | Array[string]} images 
 * @param {boolean} slider 
 */
function card(title, description, images = "", slider = false) {
    this.images = images;
    this.title  = title;
    this.description = description;
    this.slider = slider;

    /**
     * Création de la carte
     * TODO: Fonction principal retourn le control et retire l'ancien si il existe
     */
    this.createCard = function() {
        this.createImgCard();
        this.createCoreCard();
        return L.control({position: 'topleft'});
    }
    
    /**
     * Permet de modifié la ou les images de la carte
     * 
     * @param {string | Array[string]} images 
     */
    this.changeImg = function(images) {
        this.images = images;
        this.createImgCard();
    }

    /**
     * Permet de modifier le titre de la carte
     * 
     * @param {string} title 
     */
    this.changeTitle = function(title) {
        this.title = title;
        this.createCoreCard();
    }

    /**
     * Permet de modifier la description de la carte
     * 
     * @param {string} description 
     */
    this.changeDescription = function(description) {
        this.description = description;
        this.createCoreCard();
    }

    /**
     * Construceur du haut de la carte contenant l'image ou le slider
     */
    function createCoreCard() {
        return function() {
            children_card.innerHTML +=
                '<div class="card-body"><h5 class="card-title">' +
                title +
                '</h5><p class="card-text" title=' +
                descriptText +
                ">" +
                descriptText +
                "</p>" +
                '<a href="?page=' +
                title.toLowerCase() +
                '" class="btn btn-primary btn-block">En savoir plus</a></div>';
            return children_card;
        };
    }

    /**
     * Constructeur du corp de la carte contenant le titre et la desciption
     */
    function createImgCard() {
        return function() {
            var mapCard = L.DomUtil.create("div", "card legend");
            var imageCard = "";
            if (this.slider) {
                if (!Array.isArray(this.images)) {
                    throw new Error("Error - images would be an array");
                }
                if (this.images.length < 2) {
                    throw new Error("Error - images should contain more then 1 element");
                }
                imageCard = $("<div></div>", {
                    class: "card-img-top carousel slide"
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
            } else {
                imageCard = $("<img>", {
                    class: "d-block w-100 card-img-top"
                }).attr("src", this.image);
            }
            mapCard.append(imageCard);
            return mapCard;
        }
    };
}

function factoryCard(imgURL, descriptText, title) {
    switch (quarterName) {
        case "Perrache":
            legend.onAdd = factoryCard(
                "assets/images/perrache/perrache.jpg",
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.",
                quarterName
            );
            break;
        case "Bellecour":
            legend.onAdd = factoryCard(
                "assets/images/bellecour/bellecour.jpg",
                "Test de description Ouha !!!",
                quarterName
            );
            break;
        case "Terreaux":
            legend.onAdd = factoryCard(
                "assets/images/terreaux/terreaux.jpg",
                "Test de description. incroyable",
                quarterName
            );
            break;
        default:
            legend.onAdd = lastCard.onAdd;
            break;
    }
}
