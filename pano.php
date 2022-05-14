<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width, shrink-to-fit=no">
    <title>Secours Catholique - Panorama</title>
    <style>
        html, body {
            margin: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0,0,0,0.50);
        }       
       
        #loading {
            position: absolute;
            z-index: 10;
            top: calc(50% - 40px);
            left: calc(50% - 40px);
            width: 80px;
            height: 80px;
        }

        #loading div {
            position: absolute;
            border: 4px solid #fff;
            opacity: 1;
            border-radius: 50%;
            animation: loading 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
        }

        #loading div:nth-child(2) {
            animation-delay: -0.25s;
        }

        @keyframes loading {
            0% {
                top: 36px;
                left: 36px;
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                top: 0px;
                left: 0px;
                width: 72px;
                height: 72px;
                opacity: 0;
            }
        }
        
    </style>
    <link rel="stylesheet" href="css/pano-pc.css">
    <link rel="stylesheet" href="css/pano.css">
    <link rel="stylesheet" href="lib/carousel/carousel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <?php
        // Affiche les erreurs d'exécution PHP
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Récupère le nom du panorama
        $nameFolder = $_GET["img"];

        // Définit le chemin du dossier
        $dir = "assets/360/$nameFolder/Images/";

        // Récupère le contenu du dossier
        $ls = scandir($dir);
    ?>
</head>
<body>
    <div id="imgsViewer" style="display:none;">
        <div>
            <center>
                <button class="close" onclick="hideImgs()">Fermer les médias</button><br>
            
                <?php
                    // Pour chaque fichier
                    foreach ($ls as $key => $value) {

                        // Si c'est une valeur systeme, on passe à la suivante
                        if($value == "." OR $value == ".."){
                           continue;
                        }
                        
                        // Récupère l'extension du fichier
                        $fileSplit = explode(".", $value);
                        $fileExtension = end($fileSplit);

                        // Affiche la signature de paita si le nom du fichier contient "Paita"
                        if(strpos($value, "Paita")){
                            echo('<img class="logo" src="assets/images/paita-black.png">');
                        }

                        // Affiche la signature de USK si le nom du fichier contient "USK"
                        if(strpos($value, "USK")){
                            echo('<img class="logo" src="assets/images/usk.png">');
                        }

                        // Affiche l'image vidéo si le nom du fichier contient "YT"
                        if(strpos($value, "YT")){
                            echo('<img class="logo" src="assets/images/video.png">');
                        }

                        // Si c'est une image, on l'affiche
                        if($fileExtension == "jpg" OR $fileExtension == "jpeg" OR $fileExtension == "png"){
                            echo('<img src="'.$dir.$value.'">');
                        }

                        // Si c'est un fichier texte, lit le contenu et affiche un iframe youtube
                        if($fileExtension == "txt"){
                            $data = file_get_contents($dir.$value);
                            echo('
                                <iframe
                                    class="youtube-iframe"
                                    width="700" height="390"
                                    src="https://www.youtube.com/embed/'.$data.'"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>'
                            );
                        }
                    }
                ?>
                <button class="close" onclick="hideImgs()">Fermer les médias</button><br>
            </center>
        </div>            
    </div>

    <!--<div id="imgsViewerPC" style="display:none;">-->
    <div id="imgsViewerPC">
        <span class="controler">
            <button onclick="prevCarousel()"><img src="assets/icons/left.png" alt=""></button>
        </span>

        <div id="carousel">
            <?php
                // Pour chaque fichier
                foreach ($ls as $key => $value) {

                    // Si c'est une valeur systeme, on passe à la suivante
                    if($value == "." OR $value == ".."){
                        continue;
                    }
                    
                    // Récupère l'extension du fichier
                    $fileSplit = explode(".", $value);
                    $fileExtension = end($fileSplit);

                    echo('<div class="element">');

                    // Affiche la signature de paita si le nom du fichier contient "Paita"
                    if(strpos($value, "Paita")){
                        echo('<img class="logo" src="assets/images/paita-black.png" alt="Paita">');
                    }

                    // Affiche la signature de USK si le nom du fichier contient "USK"
                    if(strpos($value, "USK")){
                        echo('<img class="logo" src="assets/images/usk.png" alt="USK">');
                    }

                    // Affiche l'image vidéo si le nom du fichier contient "YT"
                    if(strpos($value, "YT")){
                        echo('<img class="logo" src="assets/images/video.png">');
                    }

                    echo('<br><br>');

                    // Si c'est une image, on l'affiche
                    if($fileExtension == "jpg" OR $fileExtension == "jpeg" OR $fileExtension == "png"){
                        echo('<img src="'.$dir.$value.'">');
                    }

                    // Si c'est un fichier texte, lit le contenu et affiche un iframe youtube
                    if($fileExtension == "txt"){
                        $data = file_get_contents($dir.$value);
                        echo('
                            <iframe
                                class="youtube-iframe"
                                width="650" height="390"
                                src="https://www.youtube.com/embed/'.$data.'"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                            </iframe>'
                        );
                    }

                    echo('<br><br>');

                    echo('<button class="close" onclick="hideImgs()">Fermer les médias</button>');

                    echo('</div>');
                }
            ?>
        </div>
        
        <span class="controler">
            <button onclick="nextCarousel()"><img src="assets/icons/right.png" alt=""></button>
        </span>
    </div>

    <div id="loading">
        <div></div>
        <div></div>
    </div>
    <script src="lib/panolens/three.min.js"></script>
    <script src="lib/panolens/panolens.min.js"></script>
    <script src="lib/carousel/carousel.js"></script>
    <script>
        // Importe des variables PHP dans le JS
        const query = "<?php echo $_GET['q']; ?>";
        const folder = query.split('/')[0];
        const x = <?php echo $_GET['x']; ?>;
        const y = <?php echo $_GET['y']; ?>;
        const z = <?php echo $_GET['z']; ?>;
        const a = "<?php echo $_GET['a']; ?>";
    </script>
    <script src="js/global.js"></script>
    <script src="js/pano.js"></script>
</body>
</html>