<?php
include './model/DbNoteDeFrais.php';

$action = $_POST['action'];

switch($action){
    case 'saisie':
        include 'vue/vueSaisie/v_Saisie.php';
        break;
}