<?php

$origin = $_POST["origin"];
$dest = $_POST["dest"];

api($origin, $dest);

function api($orig, $dest){
    // Création des variables
    $main_api = "https://www.mapquestapi.com/directions/v2/route?";
    
    $key = "VdTLpahzgy1oNSZiL8AQlSb2iuMm3Vl9";

    // Construction de l'url
    $url = $main_api . http_build_query(array("key" => $key, "from" => $orig, "to" => $dest));

    // Test url
    $json_data = json_decode(file_get_contents($url), true);

    $json_status = $json_data["info"]["statuscode"];

    // Trajet possible
    if ($json_status == 0) {
        echo "Trajet de " . $orig . " à " . $dest . "<br>";
        echo "Durée du trajet :  " . $json_data["route"]["formattedTime"] . "<br>";
        echo "Kilometers:        " . number_format(($json_data["route"]["distance"]) * 1.61, 2) . "<br>";
    }else {
        echo "Données invalides";
    } 
}
  


?>


