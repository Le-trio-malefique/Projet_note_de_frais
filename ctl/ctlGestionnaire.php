<?php
include './model/DbNoteDeFrais.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        $result = DbNoteDeFrais::list_ndf(0);
        var_dump($result);
        include 'vue/Accueil/admin.php';
        break;
}
