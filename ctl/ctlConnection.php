<?php
include './model/DbConnection.php';

$action = $_GET['action'];

switch ($action) {
    case 'formConnect':
        include 'vue/vueConnexion/v_Connexion.php';
        break;

    case 'formDeconnect':
        session_unset();
        header("Location:index.php");
        break;

    case 'connect':

        if (isset($_POST['validate'])) {

            // Vérifier si le user a bien complété tout les champs
            if (!empty($_POST['email']) && !empty($_POST['password'])) {

                // Evité que l'utilisateur malveillant utilise attaque SQL | Donnée USER
                $user_email = htmlspecialchars($_POST['email']);
                $user_mdp = htmlspecialchars($_POST['password']);

                // vérifier si l'utilisateur existe (si le mail est correct)
                $checkIfuserExists = connectPdo::getObjPdo()->prepare('SELECT * FROM `utilisateur` WHERE Mail= ?');
                $checkIfuserExists->execute(array($user_email));

                // la méthode rowCount retourne le nombre de lignes affectées par la dernière requête
                if ($checkIfuserExists->rowCount() > 0) {

                    // Récuperé toutes les donnée de l'utilisateur
                    $usersInfos = $checkIfuserExists->fetch();

                    // Vérifier si le mot de passe est correct
                    if (password_verify($usersInfos[5], $user_mdp)) {

                        // vérifier si le user est authentifier sur le site puis récupérer ses donnée à travers des variable globales sessions
                        $_SESSION['login'] = $usersInfos['email'];
                        $_SESSION['nom'] = $usersInfos['Nom'];
                        $_SESSION['prenom'] = $usersInfos['Prenom'];
                        $_SESSION['matricule'] = $usersInfos['Mat'];
                        $_SESSION['id'] = $usersInfos['Id'];
                        $_SESSION['Admin'] = $usersInfos['Admin'];

                        if ($_SESSION['Admin'] == 0) {
                            header("Location:index.php?ctl=notedefrais&action=lister");
                        } else {
                            header("Location:index.php?ctl=gestionnaire&action=profilAdmin");
                        }
                    } else {
                        $Msgerrors = "Mot de passe est incorrect.";
                    }
                } else {
                    $Msgerrors = "Votre E-mail est incorrect.";
                }
            } else {
                $Msgerrors = "Veuillez remplir tout les champs.";
            }
        }
        // $result_v = DbConnection::getVehicule($result[0]['Id']);
        // if ($result_v != null) {
        //     $_SESSION['vehicule'] = [$result_v[0]['Marque'], $result_v[0]['Modele'], $result_v[0]['Carburant'], $result_v[0]['Cylindre']];
        // }
        // echo($_SESSION['nom']);
        // echo "<br>";
        // print_r($usersInfos['Nom']);
        break;
}
