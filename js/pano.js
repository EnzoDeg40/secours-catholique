// Lorsque l'utilisateur appuie sur le point d'interet du panorama
function showImgs(){
    // Version outdoor
    if(isVerticalScren() && window.isMobile()){
        imgsViewer.style.display = "flex";
    }
    
    // Version indoor
    else{
        imgsViewerPC.style.display = "flex";
    }

    updateCarousel();
}

// Lorsque l'utilisateur appuie sur le button "Fermer le média"
function hideImgs(){
    imgsViewer.style.display = "none";
    imgsViewerPC.style.display = "none";
}

// Récupère les divs d'affichage des images
var imgsViewer = document.getElementById("imgsViewer");
var imgsViewerPC = document.getElementById("imgsViewerPC");

// Défit le point d'information
infospot = new PANOLENS.Infospot(1000, 'assets/icons/hotspot.png');
infospot.position.set(x, y, z);
infospot.addEventListener('click', function(){showImgs();});

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