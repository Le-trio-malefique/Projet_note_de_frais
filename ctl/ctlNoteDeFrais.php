<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){

    /**-----------------Note de frais---------------*/

    /** 
     * @param int id : Identifiant de l'utilisateur
     * @return array Liste des notes de frais
    */
    case 'lister':
        $valid_ndf = DbNoteDeFrais::list_ndf();

        // Function get_info_ndf
        function get_info_ndf($id_ndf){
            return DbNoteDeFrais::lister($id_ndf);
        }
        if($_GET['valid_ndf'] == 0){
            include 'vue/vueSaisie/v_ndf.php';
        }
        if($_GET['valid_ndf'] == 1){
            include 'vue/vueSaisie/v_historique.php';
        }
        
    break;

    /** 
     * @param int id : Identifiant de l'utilisateur
     * 
     * Creation d'une nouvelle note de frais
     * 
     * @return array Liste des notes de frais
    */
    case 'newNote':
        DbNoteDeFrais::newNote($_SESSION['id']);
        $valid_ndf = DbNoteDeFrais::list_ndf();

        // Function get_info_ndf
        function get_info_ndf($id_ndf){
            return DbNoteDeFrais::lister($id_ndf);
        }
        include 'vue/vueSaisie/v_ndf.php';
    break;

    /** 
     * @param int id : Identifiant de l'utilisateur
     * @param int idNdf : Identifiant de la note de frais
     * 
     * Suppression d'une note de frais
     * 
     * @return array Liste des notes de frais
    */
    case 'supprimer':
        DbNoteDeFrais::supprimer($_SESSION['id'], $_POST['idNdf']);
        
        $valid_ndf = DbNoteDeFrais::list_ndf();

        // Function get_info_ndf
        function get_info_ndf($id_ndf){
            return DbNoteDeFrais::lister($id_ndf);
        }

        include 'vue/vueSaisie/v_ndf.php';
    break;

    /**-----------------Frais---------------------*/

    /**
     * @param int idNdf : Identifiant de la note de frais
     * @return array Liste des frais
    */
    case 'listeFrais':
        $result = DbNoteDeFrais::listeFrais($_GET['Id_ndf']);
        if (isset($_GET['vue'])) {
            include 'vue/vueProfil/v_Historique_liste_frais.php';
        }else{
            include 'vue/vueSaisie/v_ndf.php';
        }
    break;

    /**
     * @param int Montant : Valeur en euro
     * @param file Justificatif : Fichier
     * @param int Id_ndf : Identifiant note de frais
     * @param string Statut : Statue de traitement du frais
     * @param string Type : Type de frais (Classique/Kilometrique)
     * @param string Detail : Detail du frais (Restaurant/Titre de transport/Parking/Péage)
     * @param date Date : Date actuel 
     * 
     * Creation d'un nouveau frais Dans une note de frais
     */
    case 'newFrais':
        DbNoteDeFrais::newFrais($_POST['Montant'],$_FILES['Justificatif'],$_GET['Id_ndf'],$_POST['Statut'], $_POST['Type'], $_POST['Detail'], $_POST['Date']);
        $result = DbNoteDeFrais::listeFrais($_GET['Id_ndf']);
        include 'vue/vueSaisie/v_ndf.php';
    break;

    case 'afficherModifierFrais':
        $result = DbNoteDeFrais::afficherModifierFrais($_GET['id']);
        include 'vue/vueSaisie/v_ndf.php';
    break;
    
    case 'modifierFrais':
        //ajout action de modification

        $result = DbNoteDeFrais::lister($_SESSION['id']);
        include 'vue/vueSaisie/v_ndf.php';
    break;

    case 'supprimerFrais':
        DbNoteDeFrais::supprimerFrais($_POST['Id']);
        $result = DbNoteDeFrais::listeFrais($_GET['Id_ndf']);
        include 'vue/vueSaisie/v_ndf.php';
    break;
    
    case 'saisie_fc':
        include 'vue/vueSaisie/v_ndf.php';
    break;

    case 'saisie_fk':
        include 'vue/vueSaisie/v_ndf.php';
    break;
}