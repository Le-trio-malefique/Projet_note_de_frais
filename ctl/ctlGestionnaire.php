<?php
include './model/DbNoteFrais.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        include 'vue/Accueil/admin.php';
        break;
}
