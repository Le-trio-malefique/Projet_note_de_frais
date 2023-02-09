<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        var_dump($_SESSION);
        $result = DbNoteDeFrais::list_ndf();
        var_dump($result);
        include 'vue/Accueil/admin.php';
        break;
}
