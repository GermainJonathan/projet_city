/**
 * Initialisation de la carte Leaflet
 * Gestion des évenements
 */
var mymap = L.map('mapid', {
  zoomControl: false  // On desactive les boutons de zoom
}).setView([45.754411, 4.796842
], 14);
L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
}).addTo(mymap);

legend = L.control({position: 'topleft'});

// On desactive le zoom molette, double click et bouger la carte
mymap.scrollWheelZoom.disable();
mymap.doubleClickZoom.disable();
mymap.dragging.disable();
addRecentrerButton();
addGeoJSONInfo();
addGeoPosition();
setupQuarterCard("Terreaux");

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
  button.innerHTML += '<button class="btn btn-primary view" onclick="resetView();"></button>'
  viewButton.onAdd = function() {
    return button;
  };
  viewButton.addTo(mymap);
}

/**
 * Création du layer avec les zones de quartier
 */
function addGeoJSONInfo() {
  geojson = L.geoJson(states, { // State est défini dans le fichier presquileGEOJSON.js inclut avant dans le template
    onEachFeature: onEachFeature,
    style: style
  }).addTo(mymap);
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

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
    setupQuarterCard(e.target.feature.properties.name);
}

/**
 * Fonction evenement Lealfet pour réinitialiser les coleurs des zones
 * @param {event} e 
 */
function resetHighlight(e) {
  geojson.resetStyle(e.target);
}

/**
 * Fonction pour gérer le zoom lors du click sur la zone ciblée
 * @param {event} e 
 */
function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
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
function style(feature) {
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