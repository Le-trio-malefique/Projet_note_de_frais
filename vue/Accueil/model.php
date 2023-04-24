<?php
include 'model/DbNoteDeFrais.php';

// Vérifie si une requête Ajax a été effectuée
if (isset($_POST['id_ndf']) and isset($_POST['id_ligne']) and isset($_POST['statut'])) {
    // Appelle la fonction "updateStatus()" avec les paramètres envoyés par Ajax
    $resultat = DbNoteDeFrais::status_valid_admin($_POST['id_ndf'], $_POST['id_ligne'], $_POST['statut']);

    // Retourne le résultat au format JSON
    echo json_encode($resultat);
    exit;
}
