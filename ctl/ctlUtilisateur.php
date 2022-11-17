<?php
include './model/DbProfil.php';

$action = $_GET['action'];

switch($action){
    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    /**
    * @function all_ndf
    * @return array tout les id et id_ndf des lignes 
    *
    * @param int id
    * identifiant de l'utilisateur
    * @return int id de 
    *
    * @param int id_ndf
    * identifiant de la note de frais  
    * @return array
    */

    case 'historique':
        $all_ndf = DbProfil::all_ndf();
        $_SESSION['ndf'] = $all_ndf;
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