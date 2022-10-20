<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){
    case 'lister':
        $result = DbNoteDeFrais::conectUser($_SESSION['id']);
        include 'vue/vueSaisie/v_Saisie.php';
        break;

    case 'newNote':
        break;
    
    case 'saisie':
        
        break;
}