<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch($action){
    case 'lister':
        include 'vue/vueSaisie/v_Saisie.php';
        break;

    case 'newNote':
        DbConnection::conectUser();
        break;
    
    case 'saisie':
        
        break;
}