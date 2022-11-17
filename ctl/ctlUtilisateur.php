<?php
include './model/DbProfil.php';

$action = $_GET['action'];

switch($action){
    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    case 'historique':
        $result = DbProfil::id_ndf($_SESSION['id']);
        
        DbProfil::listehistorique();
        include 'vue/vueProfil/v_Historique.php';
        break;

    case 'formvehicule':
        include 'vue/vueProfil/v_AjoutVehicule.php';
        break;

    case 'formajoutvehicule':
        DbProfil::ajoutvehicule($_POST['marque'], $_POST['modele'], $_POST['carburant'],$_POST['cylindre'], $_SESSION['id']);
        $_SESSION['vehicule'] = [$_POST['marque'], $_POST['modele'], $_POST['carburant'], $_POST['cylindre']];
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    case 'formmodifvehicule':
        DbProfil::modifiervehicule($_POST['marque'], $_POST['modele'], $_POST['carburant'],$_POST['cylindre'], $_SESSION['id']);
        $_SESSION['vehicule'] = [$_POST['marque'], $_POST['modele'], $_POST['carburant'], $_POST['cylindre']];
        include 'vue/vueProfil/v_Profil.php';
        break;
}