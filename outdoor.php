<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="Secours Catholique - Site OutDoor">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Secours Catholique">
    <meta property="og:description" content="Visitez le site OutDoor pour découvrir différents lieux de Paris en 360°">
    <meta property="og:image" content="https://edstudio.fr/project/secours-catholique/logo.png">
    <meta name="theme-color" content="#015293">

    <title>Secours Catholique - OutDoor</title>

    <link rel="stylesheet" href="lib/leaflet/leaflet.css">
    <link rel="stylesheet" href="lib/leaflet-routing-machine/leaflet-routing-machine.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidenav.css">

    <link rel="prefetch" href="assets/icons/alt_route.svg" />
    <link rel="prefetch" href="assets/icons/eye.svg" />
    <link rel="prefetch" href="assets/icons/share.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <!--
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    -->
</head>
<body>
    <?php
        // Récupère le popup de bienvenue et d'aide
        $welcome = file_get_contents('assets/html/accueil.html');
        $help = file_get_contents('assets/html/aide.html');
        $helpPano = file_get_contents('assets/html/aidePano.html');

        // Si le cookie n'existe pas
        if(!isset($_COOKIE['alreadyVisited'])) {
            // On crée un cookie valable une heure
            setcookie("alreadyVisited", 1, time()+3600);

            // On affiche le popup de bienvenue et d'aide
            $welcome = str_replace("{{display-start}}", "flex", $welcome);
            $help = str_replace("{{display-start}}", "flex", $help);
        }
        else{
            // On masque le popup de bienvenue et de l'aide
            $welcome = str_replace("{{display-start}}", "none", $welcome);
            $help = str_replace("{{display-start}}", "none", $help);
        }

        // On affiche le popup de bienvenue et d'aide
        echo $welcome;
        echo $help;
        echo $helpPano;
    
        // Affiche le menu 
        $sidenav = file_get_contents('assets/html/sidenav.html');
        echo $sidenav;

    ?>

    <div class="top">
        <img class="btnOpenSideBar" src="assets/icons/menu.svg" onclick="openNav()" alt="">
    </div>

    <div class="bottom">
        <img class="btnOpenSideBar" src="assets/icons/information.svg" onclick="openStart()" alt="i">
        <img class="btnOpenSideBar" src="assets/icons/question.svg" onclick="openHelp()" alt="?">
    </div>

    <div id="panorama"></div>
    <div id="map"></div>

    <script src="lib/leaflet/leaflet.js"></script>
    <script src="lib/leaflet-routing-machine/leaflet-routing-machine.min.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/script.js"></script>
    <script src="js/sidebar.js"></script>
</body>
</html>