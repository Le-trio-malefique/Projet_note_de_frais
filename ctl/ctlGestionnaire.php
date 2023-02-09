<?php
include './model/DbProfil.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        include 'vue/Accueil/admin.php';
        break;
}
