<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Païta</title>
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/paita.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
        // Lit et affiche le contenu du fichier 
        $sidenav = file_get_contents('assets/html/sidenav.html');
        echo $sidenav;
    ?>

    <div class="top">
        <img class="btnOpenSideBar" src="assets/icons/menu.svg" onclick="openNav()" alt="">
    </div>

    <iframe src="cheat/Païta – Secours catholique.html" frameborder="0"></iframe>

    <script src="js/sidebar.js"></script>
</body>
</html>