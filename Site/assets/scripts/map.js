/**
 * Gestion de la carte
 */

/* Création des Layers */
// Layer des différents marker - Séparer pour filtrer les markers par la suite
var restaurantLayer = L.layerGroup();
var monumentLayer = L.layerGroup();
var activiteLayer = L.layerGroup();

// Layer du fond de plan openstreetmap
var fondPlan = L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
});

// Données geojson
var quarterDelimitation = L.geoJson(states, { // State est défini dans le fichier presquileGEOJSON.js inclut avant dans le template
    onEachFeature: onEachFeature,
    style: style
});

// Feature active
var currentFeature = {};

/* Définition du contrôle de layer / filtre des marlers */
var layerControl = L.control.layers({},{
    "<img src='./assets/images/core/restaurant.svg' height='15'/> <span>Restaurant</span>": restaurantLayer,
    "<img src='./assets/images/core/monument.svg' height='15'/> <span>Monument</span>" : monumentLayer,
    "<img src='./assets/images/core/activity.svg' height='15'/> <span>Activite</span>" : activiteLayer
}, {
    collapsed : false
});

if(isMobileDevice) {
    // TODO: Colapse le filtre de couche
    // layerControl.setOption({
    //     collapsed: true
    // });
}

/* Création de la carte */
var mymap = L.map('mapid', {
    center: [45.754411, 4.796842],
    zoom: 14,
    zoomControl: false,  // On desactive les boutons de zoom
    layers: [fondPlan, quarterDelimitation]
});

// Définition des icones
var LeafIcon = L.Icon.extend({
    options: {
        iconSize:     [16, 20],
        iconAnchor:   [8, 10]
    }
});

// Définition des icones des markers
var restaurantIcon = new LeafIcon({iconUrl: './assets/images/core/restaurant.svg'}),
    activiteIcon = new LeafIcon({iconUrl: './assets/images/core/activity.svg'}),
    monumentIcon = new LeafIcon({iconUrl: './assets/images/core/monument.svg'});

// Card control
var legend = L.control();
var styleForced = false;
/**
 * Evenement general
 */
// Action on Zoom suivant le zoom on affiche les markers ou pas
mymap.on('zoomend', function() {
    if (mymap.getZoom() <= 14){
        mymap.removeLayer(monumentLayer);
        mymap.removeLayer(restaurantLayer);
        mymap.removeLayer(activiteLayer);
    } else {
        mymap.addLayer(monumentLayer);
        mymap.addLayer(restaurantLayer);
        mymap.addLayer(activiteLayer);
    }
});

// Resize de la fenêtre
$(window).resize(function () {
    resetView();
})

// On document ready resize de la vue sur la carte
$(function() {
    resetView();
});

// On desactive le zoom molette, double click et bouger la carte
mymap.scrollWheelZoom.disable();
mymap.doubleClickZoom.disable();
mymap.dragging.disable();
addRecentrerButton();   // Outil de recentrage
addGeoPosition();   // Demande de géolocalisation
setupQuarterCard("Terreaux");   // Création de la carte par défaut
layerControl.addTo(mymap);  // Ajout du filtre sur la carte

/**
 * Geolocalisation
 */
function addGeoPosition() {
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
    }, function(){}, {
      maximumAge:600000,
      enableHighAccuracy: true
    });
  }
}

/**
 * Bouton Recentrer
 */
function addRecentrerButton() {
  var viewButton = L.control({position: 'bottomright'});
  var button = L.DomUtil.create('div');
  button.innerHTML += '<button class="btn btn-primary view" onclick="resetView();" title="Recentrer"></button>'
  viewButton.onAdd = function() {
    return button;
  };
  viewButton.addTo(mymap);
}

/**
 * Action du bouton recentrer
 */
function resetView() {
  if($(window).width() < 1366) {
    mymap.setView(new L.LatLng(45.754411, 4.806842), 14);
  } 
  if($(window).width() < 576) {
    mymap.setView(new L.LatLng(45.757311, 4.826842), 14);
  } else {
    mymap.setView(new L.LatLng(45.754411, 4.796842), 14);
  }
  mymap.dragging.disable();
  styleForced = false;
  quarterDelimitation.resetStyle(currentFeature);
  currentFeature = {};
}

/**
 * Fonction evenement Leaflet pour colorier les zones
 * @param {event} e Zone passer en hover
 */
function highlightFeature(e) {
    if(mymap.getZoom() <= 14) {
        setupQuarterCard(e.target.feature.properties.name);
        e.target.bringToFront(); // Mets le layer en première position => un genre de z-index
        e.target.setStyle({
            weight: 5,
            color: '#E98B39',
            fillOpacity: 0
        });
    }
}

/**
 * Fonction evenement Lealfet pour réinitialiser les coleurs des zones
 * @param {event} e 
 */
function resetHighlight(e) {
    if(mymap.getZoom() <= 14 && !styleForced) {
        quarterDelimitation.resetStyle(e.target);
    }
}

/**
 * Fonction pour gérer le zoom lors du click sur la zone ciblée
 * @param {event} e 
 */
function zoomToFeature(e) {
    // Gestion du style de la feature
    setupQuarterCard(e.target.feature.properties.name);
    if(e.target != currentFeature) {
        quarterDelimitation.resetStyle(currentFeature);
        currentFeature = e.target;
        currentFeature.setStyle({
            weight: 5,
            color: '#E98B39',
            fillOpacity: 0
        });
        styleForced = true;
        currentFeature.bringToFront();
        mymap.setView(e.target.getCenter(), 16);
        monumentLayer.clearLayers();
        restaurantLayer.clearLayers();
        activiteLayer.clearLayers();
        mymap.dragging.enable();
        // récupération des données markers
        $.ajax({
          method: "GET",
          url: environnement.serviceUrl + "getMarkerByQuartier.php?quartier="+e.target.feature.properties.name
        }).done(function(data) {
          addMarkerMonuments(data.monuments);
          addMarkerActivites(data.activites);
          addMarkerRestaurants(data.restaurants);
        });
    }
}

/**
 * Mappage des events vers les fonctions js
 * @param {*} feature 
 * @param {*} layer 
 */
function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}

/**
 * Style appliquer aux features
 * @param {Feature} feature 
 */
function style() {
  return {
    fillColor: '#9e9e9e',
    weight: 2,
    opacity: 1,
    color: '#444',
    fillOpacity: 0.4
  };
}

/**
 * Mise à jour de la carte descriptif du quartier
 * @param {string} quarterName 
 */
function setupQuarterCard(quarterName) {
    const textDescriptionFactice = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.';
    let lastCard = legend;
    legend.remove();

    legend = L.control({position: 'topleft'});
    switch (quarterName) {
        case "Perrache" :
            var perracheCard = new Card(quarterName, textDescriptionFactice, 1, ["perrache.jpg", "statut-de-la-republique.jpg", "vattel.jpg"]);
            legend.onAdd = perracheCard.createCard();
            break;
        case "Bellecour" :
            var bellecourCard = new Card(quarterName, textDescriptionFactice, 2, "bellecour.jpg");
            legend.onAdd = bellecourCard.createCard();
            break;
        case "Terreaux":
            var terreauxCard = new Card(quarterName, textDescriptionFactice, 3,  "terreaux.jpg");
            legend.onAdd = terreauxCard.createCard();
            break;
        default:
            legend.onAdd = lastCard.onAdd;
            break;
    }
    legend.addTo(mymap);
}

/**
 * Mise à jour de la carte descriptif pour un patrimoine
 * @param {data} patrimoine 
 */
function setupMarkerCard(patrimoine, link) {
    legend.remove();
    legend = L.control({position: 'topleft'});
    var patrimoineCard = new Card(patrimoine.name, patrimoine.description, patrimoine.idQuartier, patrimoine.images, link);
    legend.onAdd = patrimoineCard.createCard();
    legend.addTo(mymap);
}

/**
 * Mise à jour de la carte descriptif pour un patrimoine
 * @param {data} patrimoine 
 */
function setupModalMarkerCard(patrimoine, link) {
    var patrimoineCard = new Card(patrimoine.name, patrimoine.description, patrimoine.idQuartier, patrimoine.images, link);
    var card = patrimoineCard.createSimpleCard()
    card.removeClass("legend");
    card.addClass('modalCard');
    var modal = $('#mobileModal').find('.modal-body'); // On récupère la modal du template
    modal.empty();  // On vide la modal
    modal.html(card); // Mise à jour de la modal
    $('#mobileModal').modal({show: true}); // Affichage de la modal
}

/**
 * Création des markers pour les objets type Monument
 * @param {*} monuments
 */
function addMarkerMonuments(monuments) {
    monuments.forEach(function(monument) {
        let markerMonument = L.marker([monument.coordonees.x, monument.coordonees.y], {icon: monumentIcon})
        .on('click', function() {
            if(isMobileDevice) {
                setupModalMarkerCard(monument, '#anchorBodyMonuments');
            } else {
                setupMarkerCard(monument, '#anchorBodyMonuments');
            }
        })
        .on('mouseover', function() {
            var scaleUp = markerMonument.options.icon;
            scaleUp.options.iconSize = [36, 20];
            scaleUp.options.iconAnchor = [18, 10];
            markerMonument.setIcon(scaleUp);
        })
        .on('mouseout', function() {
            var normalScale = markerMonument.options.icon;
            normalScale.options.iconSize = [16, 20];
            normalScale.options.iconAnchor = [8, 10];
            markerMonument.setIcon(normalScale);
        });
        monumentLayer.addLayer(markerMonument);
    });
}

function addMarkerRestaurants(restaurants) {
    restaurants.forEach(function(restaurant) {
        let markerRestaurant = L.marker([restaurant.coordonees.x, restaurant.coordonees.y], {icon: restaurantIcon})
        .on('click', function() {
            if(isMobileDevice) {
                setupModalMarkerCard(restaurant, "#anchorBodyRestaurants");
            } else {
                setupMarkerCard(restaurant, "#anchorBodyRestaurants");
            }
        })
        .on('mouseover', function() {
            var scaleUp = markerRestaurant.options.icon;
            scaleUp.options.iconSize = [36, 20];
            scaleUp.options.iconAnchor = [18, 10];
            markerRestaurant.setIcon(scaleUp);
        })
        .on('mouseout', function() {
            var normalScale = markerRestaurant.options.icon;
            normalScale.options.iconSize = [16, 20];
            normalScale.options.iconAnchor = [8, 10];
            markerRestaurant.setIcon(normalScale);
        });
        restaurantLayer.addLayer(markerRestaurant);
    });
}

function addMarkerActivites(activites) {
        activites.forEach(function(activite) {
        let markerActivite = L.marker([activite.coordonees.x, activite.coordonees.y], {icon: activiteIcon})
        .on('click', function() {
            if(isMobileDevice) {
                setupModalMarkerCard(activite, "#anchorBodyActivites");
            } else {
                setupMarkerCard(activite, "#anchorBodyActivites");
            }
        })
        .on('mouseover', function() {
            var scaleUp = markerActivite.options.icon;
            scaleUp.options.iconSize = [36, 20];
            scaleUp.options.iconAnchor = [18, 10];
            markerActivite.setIcon(scaleUp);
        })
        .on('mouseout', function() {
            var normalScale = markerActivite.options.icon;
            normalScale.options.iconSize = [16, 20];
            normalScale.options.iconAnchor = [8, 10];
            markerActivite.setIcon(normalScale);
        });
        activiteLayer.addLayer(markerActivite);
    });
}
