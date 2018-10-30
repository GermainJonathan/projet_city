/**
 * Initialisation de la carte Leaflet
 * Gestion des évenements
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

var layerControl = L.control.layers({},{
    "<img src='./assets/images/core/restaurant.svg' height='15'/> <span>Restaurant</span>": restaurantLayer,
    "<img src='./assets/images/core/monument.svg' height='15'/> <span>Monument</span>" : monumentLayer,
    "<img src='./assets/images/core/activity.svg' height='15'/> <span>Activite</span>" : activiteLayer
});

/* Création de la carte */
var mymap = L.map('mapid', {
    center: [45.754411, 4.796842],
    zoom: 14,
    zoomControl: false,  // On desactive les boutons de zoom
    layers: [fondPlan, quarterDelimitation]
});
// Action on Zoom
mymap.on('zoomend', function() {
    console.log(mymap.getZoom());
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

// Définition des icones
var LeafIcon = L.Icon.extend({
  options: {
      iconSize:     [16, 20],
      iconAnchor:   [8, 10]
  }
});

var restaurantIcon = new LeafIcon({iconUrl: './assets/images/core/restaurant.svg'}),
    activiteIcon = new LeafIcon({iconUrl: './assets/images/core/activity.svg'}),
    monumentIcon = new LeafIcon({iconUrl: './assets/images/core/monument.svg'});

// Card control
legend = L.control();

// On desactive le zoom molette, double click et bouger la carte
mymap.scrollWheelZoom.disable();
mymap.doubleClickZoom.disable();
mymap.dragging.disable();
addRecentrerButton();
addGeoPosition();
setupQuarterCard("Terreaux");
layerControl.addTo(mymap);

/**
 * Evenement lors du resize de la page // Responsive
 */
$(window).resize(function () {
  resetView();
})

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
  if($(window).width() < 1000) {
    mymap.setView(new L.LatLng(45.754411, 4.806842), 14);
  } else {
    mymap.setView(new L.LatLng(45.754411, 4.796842), 14);
  }
}

/**
 * Fonction evenement Leaflet pour colorier les zones
 * @param {event} e Zone passer en hover
 */
function highlightFeature(e) {
    var layer = e.target;
    layer.setStyle({
      weight: 5,
      color: '#E98B39',
      fillOpacity: 0
    });
    layer.bringToFront(); // Mets le layer en première position => un genre de z-index
    setupQuarterCard(e.target.feature.properties.name);
}

/**
 * Fonction evenement Lealfet pour réinitialiser les coleurs des zones
 * @param {event} e 
 */
function resetHighlight(e) {
    quarterDelimitation.resetStyle(e.target);
}

/**
 * Fonction pour gérer le zoom lors du click sur la zone ciblée
 * @param {event} e 
 */
function zoomToFeature(e) {
  // TODO: Correction sur le zoom / Alternative au fitBounds
    mymap.fitBounds(e.target.getBounds());
    $.ajax({
      method: "GET",
      url: "/services/getMarkerParQuartier.php?quartier="+e.target.feature.properties.name
    }).done(function(data) {
      addMarkerMonuments(data.monuments);
      addMarkerActivites(data.activites);
      addMarkerRestaurants(data.restaurants);
    });
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
        var perracheCard = new Card(quarterName, textDescriptionFactice,["assets/images/perrache/perrache.jpg", "assets/images/bellecour/bellecour.jpg", "assets/images/terreaux/terreaux.jpg"], true);
        legend.onAdd = perracheCard.createCard();
        break;
    case "Bellecour" :
        var bellecourCard = new Card(quarterName, textDescriptionFactice,"assets/images/bellecour/bellecour.jpg", false);
        legend.onAdd = bellecourCard.createCard();
        break;
    case "Terreaux":
        var terreauxCard = new Card(quarterName, textDescriptionFactice,"assets/images/terreaux/terreaux.jpg", false);
        legend.onAdd = terreauxCard.createCard();
        break;
    default:
        legend.onAdd = lastCard.onAdd;
        break;
    }
    legend.addTo(mymap);
}

function addMarkerMonuments(monuments) {
    for(let monument of monuments) {
        let markerMonument = L.marker([monument.coordonees.x, monument.coordonees.y], {icon: monumentIcon})
        .bindPopup(monument.libelleMonument)
        .on('click', function() {
            setupMarkerCard(monument);
        });
        monumentLayer.addLayer(markerMonument);
    }
    monumentLayer.addTo(mymap);
}

function addMarkerRestaurants(restaurants) {
    for(let restaurant of restaurants) {
        let markerRestaurant = L.marker([restaurant.coordonees.x, restaurant.coordonees.y], {icon: restaurantIcon})
        .bindPopup(restaurant.nom)
        .on('click', function() {
            setupMarkerCard(monument);
        });
        restaurantLayer.addLayer(markerRestaurant);
    }
    restaurantLayer.addTo(mymap);
}

function addMarkerActivites(activites) {
    for(let activite of activites) {
        let markerActivite = L.marker([activite.coordonees.x, activite.coordonees.y], {icon: activiteIcon})
        .bindPopup(activite.titreActivite)
        .on('click', function() {
            setupMarkerCard(monument);
        });
        activiteLayer.addLayer(markerActivite);
    }
    activiteLayer.addTo(mymap);
}

function setupMarkerCard(patrimoine) {
    return true;
}