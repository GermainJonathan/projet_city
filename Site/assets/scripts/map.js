/**
 * Initialisation de la carte Leaflet
 * Gestion des évenements
 */
var mymap = L.map('mapid', {
  zoomControl: false  // On desactive les boutons de zoom
}).setView([45.756411, 4.798842
], 14);
L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
}).addTo(mymap);

// On desactive le zoom molette, double click et bouger la carte
mymap.scrollWheelZoom.disable();
mymap.doubleClickZoom.disable();
mymap.dragging.disable();

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
 * 
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

function style(feature) {
  return {
    fillColor: '#9e9e9e',
    weight: 2,
    opacity: 1,
    color: '#444',
    fillOpacity: 0.4
  };
}

var geojson = L.geoJson(states, {
    onEachFeature: onEachFeature,
    style: style
}).addTo(mymap);

var legend = L.control({position: 'topleft'});

legend.onAdd = function(mymap) {
  let main_card = L.DomUtil.create('div', 'card legend ');
  main_card.innerHTML += `
  <img class="card-img-top" src="assets/images/perrache.jpg" alt="Photo de Perrache">
  <div class="card-body">
    <h5 class="card-title">Perrache</h5>
    <p class="card-text" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus felis at congue tempus. Integer egestas vehicula orci, sodales vulputate diam sodales nec.</p>
    <a href="#" class="btn btn-primary btn-block">En savoir plus</a>
  </div>
  `;
  return main_card;
};

function factoryCard(imgURL, descriptText, title) {
  let children_card = "";
  children_card += '<img class="card-img-top" src="' + imgURL + '" alt="' + title + '">';
  children_card += '<div class="card-body"><h5 class="card-title">' + title + '</h5>';
  children_card += '<p class="card-text">' + descriptText + '</p>' + '<a href="#" class="btn btn-primary btn-block">En savoir plus</a>';
  children_card += '</div>';
  return children_card;
}

legend.addTo(mymap);