<?php

$action = $_GET['action'];

switch($action){
    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    case 'historique':
        include 'vue/vueProfil/v_Historique.php';
        break;

    case 'formvehicule':
        include 'vue/vueProfil/v_AjoutVehicule.php';
        break;

}