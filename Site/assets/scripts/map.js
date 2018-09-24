var mymap = L.map('mapid', {
  zoomControl: false
}).setView([45.758399, 4.832487], 15);
L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
}).addTo(mymap);
mymap.scrollWheelZoom.disable();
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
}
function resetHighlight(e) {
    geojson.resetStyle(e.target);
}
function zoomToFeature(e) {
    mymap.fitBounds(e.target.getBounds());
}
function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}
L.geoJson(states, {
    onEachFeature: onEachFeature
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
    console.log(mymap.getZoom());
    if (mymap.getZoom() < 17) {
            mymap.removeLayer(shelterMarkers);
    }
    else {
            mymap.addLayer(shelterMarkers);
    }
});