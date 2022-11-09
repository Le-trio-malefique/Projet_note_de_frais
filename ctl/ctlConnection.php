<?php
include './model/DbConnection.php';

$action = $_GET['action'];

switch($action){
    case 'formConnect':
        include 'vue/vueConnexion/v_Connexion.php';
        break;
    
    case 'formDeconnect':
        session_unset();
        header("Location:index.php");
        break;

    case 'connect':

        if(isset($_POST['email']) && isset($_POST['password'])){

            $result = DbConnection::connectUser($_POST['email'],$_POST['password']);
            
            if($result != null){
                $_SESSION['login'] = $_POST['email'];
                $_SESSION['nom'] = $result[0]['Nom'];
                $_SESSION['prenom'] = $result[0]['Prenom'];
                $_SESSION['matricule'] = $result[0]['Mat'];
                $_SESSION['id'] = $result[0]['Id'];
                $result_v = DbConnection::getVehicule($result[0]['Id']);
                if($result_v != null){
                    $_SESSION['vehicule'] = [$result_v[0]['Marque'], $result_v[0]['Modele'], $result_v[0]['Carburant'], $result_v[0]['Cylindre']];
                }
                header("Location:index.php?ctl=notedefrais&action=lister");
            }
            if($result == null){
                header("Location:index.php?ctl=Connection&action=formConnect&msg=identifiant ou mots de passe incorrect");
            }
        }
        
        break;
}