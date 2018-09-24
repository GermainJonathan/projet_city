/**
 * Initialisation de la carte Leaflet
 * Gestion des évenements
 */
var mymap = L.map('mapid', {
  zoomControl: false  // On desactive les boutons de zoom
}).setView([45.755411, 4.798842
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
  console.log("mouse out");
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

var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'leaf-shadow.png',
        iconSize:     [28, 37],
        shadowSize:   [0, 0],
        iconAnchor:   [0, 0],
        shadowAnchor: [0, 0],
        popupAnchor:  [19, -3]
    }
});

var fourchette = new LeafIcon({iconUrl: 'utensils-solid.png'});
const marker = L.marker([45.756331, 4.835529], {icon: fourchette}).bindPopup("Restaurant Sud<br> <a href='https://www.brasseries-bocuse.com/'>brasseries-bocuse</a>");
var shelterMarkers = new L.FeatureGroup();

shelterMarkers.addLayer(marker);

mymap.on('zoomend', function() {
    if (mymap.getZoom() < 17) {
            mymap.removeLayer(shelterMarkers);
    }
    else {
            mymap.addLayer(shelterMarkers);
    }
});