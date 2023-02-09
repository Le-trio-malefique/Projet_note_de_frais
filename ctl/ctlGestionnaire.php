<?php
include 'model/DbProfil.php';

$action = $_GET['action'];

switch ($action) {
    case 'profilAdmin':
        // function verify connection user and admin
        include 'vue/Accueil/admin.php';
        break;
}
