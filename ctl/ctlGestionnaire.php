<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        $AllUsers = DbNoteDeFrais::listeUtilisateur();
        $All_data_ndf = DbNoteDeFrais::AllNdf();
        $all_ligne = DbNoteDeFrais::AllLigne();

        include 'vue/Accueil/admin.php';
        break;
}
