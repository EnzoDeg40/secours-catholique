// Télécharge le fichiers json pour placer les marqueurs sur la carte
async function loadJson() {
    const response = await fetch('api.json');
    reponseJson = await response.json();

    for (let i = 0; i < reponseJson.length; i++) {
        //console.log(reponseJson[i][1]);
        
        const name = reponseJson[i][0];
        const x    = reponseJson[i][1].split(', ')[0];
        const y    = reponseJson[i][1].split(', ')[1];
        const img  = reponseJson[i][2];
        const rot  = reponseJson[i][3];
        const additionalImgs = reponseJson[i][4];

        L.marker([x, y]).addTo(map)
        .bindPopup(
            `
                <div>${reponseJson[i][0]}</div>
                <img src="assets/icons/alt_route.svg" alt="Iténéraire vers ce point" onclick="go(${x},${y})">
                <img src="assets/icons/eye.svg" alt="Voir le panorama" onclick="panoOpen(\'${name}/${img}\', ${rot}, \'${additionalImgs}\')">
                <img src="assets/icons/share.svg" alt="Partager ce point" onclick="share(\'${name}\')">
            `
        );
    }   
}

// Ouvre le menu laterale de gauche
function openNav() {
    document.getElementById("sidenav").style.width = "250px";
}

// Ferme le menu laterale de gauche
function closeNav() {
    document.getElementById("sidenav").style.width = "0";
}

// Ouvre un panorama
function panoOpen(q, x, y, z, a){
    const name = q.split('/')[0];
    const url = `pano.php?q=${q}&x=${x}&y=${y}&z=${z}&a=${a}&img=${name}`;
    console.log(url);
    document.getElementById('panorama').innerHTML = 
    `<img src="assets/icons/close.svg" alt="" onclick="panoClose()">\
    <iframe allowfullscreen src="${url}"></iframe>`;
}

// Ferme le panorama actuellement ouvert
function panoClose(){
    document.getElementById('panorama').innerHTML = "";
}

// Partage la page
function share(q){
    const shareData = {
        title: 'Site OutDoor',
        text: 'Visitez le lieu "' + q + '" en 360° sur le site secours-catholique',
        url: 'https://edstudio.fr/project/secours-catholique'
    }

    navigator.share(shareData);
}

function parkour(){
    let points = [];
    /*
    for (let i = 0; i < reponseJson.length; i++) {
        const name = reponseJson[i][0];
        const x = reponseJson[i][1].split(', ')[0];
        const y = reponseJson[i][1].split(', ')[1];
        const img = reponseJson[i][2];
        points.push(L.latLng(x, y));
    }*/
    console.log(points);

    var parkour = L.Routing.control({
        waypoints: [
            L.latLng(48.8391589455749, 2.3500561311743415), // 1 
            L.latLng(48.85072087893228, 2.3613934134141923), // 2
            L.latLng(48.852287536067706, 2.357639259582509), // 3
            L.latLng(48.850875729772405, 2.35321546195698), // 4
            L.latLng(48.85136661386947, 2.3514503864678886), // 5
            L.latLng(48.853270474173044, 2.34680141570036), // 6
            L.latLng(48.856547916788955, 2.342509436915052), // 7
            L.latLng(48.85431991590883, 2.3357365589945087), // 8
            L.latLng(48.85839361258938, 2.337610053471593), // 9
            L.latLng(48.86169896524472, 2.334681288707981), // 10
            L.latLng(48.863943879149794, 2.3372070138226446), // 11
            L.latLng(48.86301398465097, 2.316530563411216), // 12
        ],
        language: 'fr'
    }).addTo(map);
}

function hideStart(){
    document.getElementById('start').style.display = 'none';
}