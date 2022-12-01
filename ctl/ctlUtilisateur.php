<?php
include './model/DbProfil.php';

$action = $_GET['action'];

switch($action){
    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;
    
    /**-----------------------HISTORIQUE----------------*/
    /* 
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
        // Récupération de toute les ndf d'un utilisateur
        $all_ndf = DbProfil::all_ndf($_SESSION['id']);

        // Boucle pour is_valid note de frais
        $valid_ndf = array();
        foreach ($all_ndf as $value) {
            if(DbProfil::is_ndf_valid($value[0])[0] == 1){
                $valid_ndf[] += $value[0];
            }
        }

        //Function get_info_ndf
        function get_info_ndf($id_ndf){
            return DbProfil::lister_historique($id_ndf);
        }

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