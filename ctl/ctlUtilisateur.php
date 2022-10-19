<?php
include './model/DbUtilisateur.php';

$action = $_POST['action'];

switch($action){
    case 'formConnect':
        include 'vue/vueConnexion/v_Connexion.php';
        break;
    
    case 'formDeconnect':
        session_unset();
        header("Location:index.php");
        break;

    case 'formNew':
        include 'vue/vueNewUser/v_NewUser.php';
        break;

    case 'NewUser':
        if(isset($_POST['email']) && isset($_POST['password'])){
            DbUtilisateur::newUser($_POST['email'],$_POST['password']);
        }
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