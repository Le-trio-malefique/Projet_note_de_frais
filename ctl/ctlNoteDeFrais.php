<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){
    case 'saisie':
        include 'vue/vueSaisie/v_Saisie.php';
        break;

    case 'newNote':

        break;
    
    case 'saisieNote':
        
        break;
}