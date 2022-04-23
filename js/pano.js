// Fonction pour récupéré une varaible dans l'url
function gup( name, url ) {
    if (!url) url = location.href;
    name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
    var regexS = "[\\?&]"+name+"=([^&#]*)";
    var regex = new RegExp( regexS );
    var results = regex.exec( url );
    return results == null ? null : results[1];
}

function showImgs(){
    imgsViewer.style.display = "block";
}

function hideImgs(){
    imgsViewer.style.display = "none";
}

function watch(){
    window.open("assets/videos/matlet%20paita%209.mp4", '_blank').focus();
}


function switchImgs(){
    let img = imgsViewer.getElementsByTagName('img');
    let btn = imgsViewer.getElementsByTagName('img');
    if(imgSelect == 1){
        img[0].style.display = 'block'
        img[1].style.display = 'none'
        imgSelect = 0;
    }else{
        img[0].style.display = 'none'
        img[1].style.display = 'block'
        imgSelect = 1;
    }
}

var imgSelect = 1;

// Récupère les varaibles de l'url
var query = gup('q', window.location.href);
var folder = query.split('/')[0];
var x = parseInt(gup('x', window.location.href));
var y = parseInt(gup('y', window.location.href));
var z = parseInt(gup('z', window.location.href));
var a = gup('a', window.location.href);

// Défit le point d'information
infospot = new PANOLENS.Infospot( 1000, 'assets/icons/hotspot.png');
infospot.position.set(x, y, z);
infospot.addEventListener('click', function(){showImgs();});

// Génère les images à afficher
/*
var imgsViewer = document.getElementById("imgsViewer");
if(a == "paita+usk"){
    imgsViewer.innerHTML = `
        <div>
            <center>
                <button class="close" onclick="hideImgs()">Fermer</button><br>
            
                <img class="logo" src="assets/images/paita-black.png">
                <img src="assets/360/${folder}/paita.jpg">
                <button class="video" onclick="watch()">Voir la vidéo</button><br>

                <img class="logo" src="assets/images/usk.png">
                <img src="assets/360/${folder}/usk.jpg">
                <button class="video" onclick="watch()">Voir la vidéo</button><br>
            </center>
        </div>
    `;    
    console.log("paita+usk");

}else{
    imgsViewer.innerHTML = `
        <div>
            <button class="close" onclick="hideImgs()">Fermer</button>

            <img class="logo" src="assets/images/paita-black.png">
            <img src="assets/360/${folder}/paita.jpg">
        </div>
    `;
    console.log("other");
}
console.log(a);*/

// Définit la photosphère
const panorama = new PANOLENS.ImagePanorama('assets/360/' + query);
const viewer = new PANOLENS.Viewer();
viewer.setCameraFov(100);

// Ajoute le point d'information sur la carte
panorama.add(infospot);

// Lorsque la photosphère est chargé 
panorama.addEventListener('load', function() {
    infospot.focus();
    document.getElementById('loading').style.display = "none";
});

// Affiche la photosphère
viewer.add(panorama);