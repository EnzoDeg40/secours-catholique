<?php
// Mets la liste de tous les dossiers dans une liste
$dir = 'assets/360/';
$files = scandir($dir);

// Supprime . et .. de la liste des fichiers
unset($files[0]);
unset($files[1]);
sort($files);

// Récupère les coordonnées gps à partir de chaque dossier
// -0, -0 : Le fichier n'a pas pu être lu 
// 0, 0 : Le fichier gps.txt n'existe pas dans le dossier en question
$gps = [];
foreach ($files as $key => $value) {
    $gpsPath = $dir.$value."/gps.txt";
    //print($gpsPath);
    //print($key);

    if(file_exists($gpsPath)){
        try {
            $gps[$key] = file_get_contents($gpsPath);
        } catch (\Throwable $th) {
            $gps[$key] = '-0, -0';
        }  
    }else{
        $gps[$key] = '0, 0';
    };
}

// Récupère la photoshère à partir de chaque dossier
// To do
$img = [];
foreach ($files as $key => $value) {
    
    $ls = scandir($dir.$value);

    // Supprime . et .. de la liste des fichiers
    unset($ls[0]);
    unset($ls[1]);
    sort($ls);

    foreach ($ls as $key => $value) {
        if(explode(".", $value)[1] != "jpg"){
            unset($ls[$key]);
        }elseif(substr($value, 0, 4) != "IMG_"){
            unset($ls[$key]);           
        }
    }

    array_push($img, $ls[key($ls)]);
}
//echo(json_encode($img));

// Assemble toutes la valeurs pour les transformées en json
$json = [];
for ($i=0; $i < sizeof($files); $i++) { 
    $json[$i] = array($files[$i], $gps[$i], $img[$i]);
}

echo(json_encode($json));
?>