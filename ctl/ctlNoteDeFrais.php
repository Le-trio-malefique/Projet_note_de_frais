<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){
    case 'lister':
        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ListeNdf.php';
        break;

    case 'listeFrais':
        $result = DbNoteDeFrais::listeFrais($_GET['Id_ndf']);
        include 'vue/vueSaisie/v_Liste_frais.php';
        break;

    case 'newNote':
        DbNoteDeFrais::newNote($_SESSION['id']);
        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ListeNdf.php';
        break;
    
    case 'supprimer':
        DbNoteDeFrais::supprimer($_SESSION['id'], $_POST['idNdf']);
        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ListeNdf.php';
        break;
    
    case 'saisie':
        include 'vue/vueSaisie/v_Saisie.php';
        break;
}