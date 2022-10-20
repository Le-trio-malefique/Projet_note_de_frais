<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){
    case 'lister':
        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ListeNdf.php';
        break;

    case 'newNote':
        DbNoteDeFrais::newNote($_SESSION['id']);
        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ListeNdf.php';
        break;
    
    case 'saisie':
        
        break;
}