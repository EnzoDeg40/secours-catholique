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
    <link rel="stylesheet" href="css/pano.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <div id="imgsViewer" style="display:none;">
        <div>
            <center>
                <button class="close" onclick="hideImgs()">Fermer les images</button><br>
            
                <?php
                    // Affiche les erreurs
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
                    
                    $nameFolder = $_GET["img"];
                    $dir = "assets/360/$nameFolder/";

                    // Récupère le contenu du dossier
                    $ls = scandir($dir);

                    // Pour chaque fichier
                    foreach ($ls as $key => $value) {

                        // Si c'est un dossier
                        if($value == "." OR $value == ".."){
                            continue;
                        }
                        
                        if(!is_dir($dir.$value)){
                            continue;
                        }

                        //echo($dir.$value.'<br>');

                        $ls = scandir($dir.$value);
                        
                        if($value == "USK"){
                            print('<img class="logo" src="assets/images/usk.png">');
                        }
                        elseif($value == "Paita"){
                            print('<img class="logo" src="assets/images/paita-black.png">');
                        }
                        else{
                            print("<h1>$value</h1>");                        
                        }
                        
                        foreach ($ls as $key => $image) {
                            if($image == "." OR $image == ".."){
                                continue;
                            }

                            print("<img src=\"$dir$value/$image\"><br>");
                        }

                    }

                    //<img class="logo" src="assets/images/usk.png">
                    //<img src="assets/360/Pont%20Marie/usk.jpg">
                    //<button class="video" onclick="watch()">Voir la vidéo</button><br>
                ?>
                <button class="close" onclick="hideImgs()">Fermer les images</button><br>
            </center>
        </div>            
    </div>

    <div id="loading">
        <div></div>
        <div></div>
    </div>
    <script src="lib/panolens/three.min.js"></script>
    <script src="lib/panolens/panolens.min.js"></script>
    <script src="js/pano.js"></script>
</body>
</html>