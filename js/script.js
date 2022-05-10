// Récupère la taille de l'écran
let x = window.innerWidth || docElem.clientWidth || body.clientWidth;

// Définit le zoom selon la taille de l'écran
let zoom = 14;
if (x < 480) {
    zoom = 13;
}

// Définit la carte avec comme point de vue par défaut Paris
var map = L.map("map", {
    center: [48.85818299537591, 2.3401020332948073],
    zoom: zoom
});

// Définit la carte utilisé (openstreetmap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="https://edstudio.fr">EdStudio</a>'
}).addTo(map);

var reponseJson;
loadJson();

// Géolocalisation
function onLocationFound(e) {
    /*var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);*/
    
    userPostion.setLatLng(e.latlng).update();

    //console.log(e.latlng);
    gps = e.latlng;
}

/* DESACTIVATION DE LA GÉOLOCALISATION TEMPORAIREMENT
// Recupère constament la position de la personne
map.locate({watch: true});

// Initie les varibles
var gps;
var userPostion = L.marker([0,0]).addTo(map);

map.on('locationfound', onLocationFound);

function locateMe(){
    map.panTo(gps);
}*/

function go(x, y){
    L.Routing.control({
        waypoints: [
            L.latLng(gps["lat"], gps["lng"]),
            L.latLng(x, y)
        ],
        routeWhileDragging: true
    }).addTo(map);
}

function openStart(){
    document.getElementById("start").style.display = "flex";
}

function openHelp() {
    document.getElementById("help").style.display = "flex";
}

function openHelpPano() {
    document.getElementById("helpPano").style.display = "flex";
}

function hideHelpPano() {
    document.getElementById("helpPano").style.display = "none";
}

function hideHelp() {
    document.getElementById("help").style.display = "none";
}

document.getElementsByClassName('leaflet-control-zoom leaflet-bar leaflet-control')[0].style.display = 'none';