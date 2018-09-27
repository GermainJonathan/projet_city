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

var geojson = L.geoJson(states, {
    onEachFeature: onEachFeature,
    style: style
}).addTo(mymap);

/**
 * Evenement lors du resize de la page // Responsive
 */
$(window).resize(function () {
  if($(window).width() < 1000) {
    mymap.setView(new L.LatLng(45.754411, 4.806842), 14);
  } else {
    mymap.setView(new L.LatLng(45.754411, 4.796842), 14);
  }
})


if(navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    console.log(position);
    L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
  }, function(){}, {
    maximumAge:600000,
    enableHighAccuracy: true
  });
}
var viewButton = L.control({position: 'bottomright'});
var button = L.DomUtil.create('div');
button.innerHTML += '<button class="btn btn-primary view" onclick="resetView();"></button>'
viewButton.onAdd = function() {
  return button;
};
viewButton.addTo(mymap);

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
    setupCard(e.target.feature.properties.name);
    legend.addTo(mymap);
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
 * Fabrique de carte descriptif
 * @param {string} imgURL 
 * @param {string} descriptText 
 * @param {string} title 
 */
function factoryCard(imgURL, descriptText, title) {
  return function(mymap) {
    let children_card = L.DomUtil.create('div', 'card legend');
    children_card.innerHTML += '<img class="card-img-top" src="' + imgURL + '" alt="' + title + '"/>';
    children_card.innerHTML += '<div class="card-body"><h5 class="card-title">' + title + '</h5><p class="card-text" title=' + descriptText + '>' + descriptText + '</p>' + '<a href="?page=' + title.toLowerCase() + '" class="btn btn-primary btn-block">En savoir plus</a></div>';
    return children_card;
  };

}

/**
 * Mise à jour de la carte descriptif du quartier
 * @param {string} quarterName 
 */
function setupCard(quarterName) {
  let lastCard = legend;
  legend.remove();

  legend = L.control({position: 'topleft'});

  switch (quarterName) {
    case "Perrache" :
      legend.onAdd = factoryCard("assets/images/perrache/perrache.jpg", 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.', quarterName);
      break;
    case "Bellecour" :
      legend.onAdd = factoryCard("assets/images/bellecour/bellecour.jpg", 'Test de description Ouha !!!', quarterName);
      break;
    case "Terreaux":
      legend.onAdd = factoryCard("assets/images/terreaux/terreaux.jpg", 'Test de description. incroyable', quarterName);
      break;
    default:
      legend.onAdd = lastCard.onAdd;
      break;
  }
}