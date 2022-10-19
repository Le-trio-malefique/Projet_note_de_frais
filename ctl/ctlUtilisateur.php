<?php
include './model/DbUtilisateur.php';

$action = $_GET['action'];

switch($action){
    case 'formConnect':
        include 'vue/vueConnexion/v_Connexion.php';
        break;
    
    case 'formDeconnect':
        session_unset();
        header("Location:index.php");
        break;

    case 'profil':
        include 'vue/vueProfil/v_Profil.php';
        break;

    case 'connect':

        if(isset($_POST['email']) && isset($_POST['password'])){

            $result = DbUtilisateur::conectUser($_POST['email'],$_POST['password']);

            if($result != null){
                $_SESSION['login'] = $_POST['email'];
                header("Location:index.php?ctl=notedefrais&action=saisie");
            }
            if($result == null){
                header("Location:index.php?ctl=utilisateur&action=formConnect&msg=identifiant ou mots de passe incorrect");
            }
        }
        
        break;
    
}