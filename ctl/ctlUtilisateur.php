<?php
include './model/DbProfil.php';

$action = $_GET['action'];

switch($action){
    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    /**-----------------------HISTORIQUE----------------*/
    /**
    * //function all_ndf
    * @param int Id
    * identifiant de l'utilisateur
    * @return array all_ndf 
    * Contient toutes les id_ndf d'un utilisateur
    *
    * //function is_ndf_valid
    * @param int id_ndf
    * identifiant de l'utilisateur
    * @return array valid_ndf
    * Contient les id_ndf valides
    *
    * //function get_info_ndf
    * @param int id_ndf
    * les notes de frais valides
    * @return array
    * Contient les infos d'une ndf
    */

    case 'historique':
        // Function all_ndf
        $all_ndf = DbProfil::all_ndf($_SESSION['id']);

        // Function is_ndf_valid
        $valid_ndf = array();
        foreach ($all_ndf as $id_ndf) {
            if(DbProfil::is_ndf_valid($id_ndf[0])[0] == 1){
                $valid_ndf[] += $id_ndf[0];
            }
        }

        // Function get_info_ndf
        function get_info_ndf($id_ndf){
            return DbProfil::lister_historique($id_ndf);
        }

        include 'vue/vueProfil/v_Historique.php';
        break;


/** VEHICULE */
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