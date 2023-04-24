<?php
include 'connectPdo.php';

class DbNoteDeFrais
{
    /**
     * HISTORIQUE
     */
    public static function list_ndf($type_ndf)
    { // rentrer en paramètre le 0 ou 1
        // Function all_ndf
        if (isset($_SESSION['Admin']) != 1) {
            $all_ndf = DbNoteDeFrais::all_ndf($_SESSION['id']);
        } else {
            $all_ndf = DbNoteDeFrais::all_ndf_gestionnaire();
        }
        // Function is_ndf_valid
        $valid_ndf = array();
        foreach ($all_ndf as $id_ndf) {
            if (DbNoteDeFrais::is_ndf_valid($id_ndf[0])[0] == $type_ndf) { // <----passer en param d'entrée 
                $valid_ndf[] += $id_ndf[0];
            }
        }
        return $valid_ndf;
    }

    public static function all_ndf_gestionnaire()
    {
        $sql = "SELECT Id_ndf FROM note_de_frais";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function all_ndf($id_utilisateur)
    {
        $sql = "SELECT Id_ndf FROM note_de_frais WHERE Id_Utilisateur = $id_utilisateur;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function is_ndf_valid($id_ndf)
    {
        $sql = "SELECT IF(COUNT(*)>0 OR (SELECT count(*) from ligne AS ligne_sub WHERE ligne_sub.Id_ndf=ligne.Id_ndf)=0,0,1) AS is_valid FROM ligne WHERE ligne.Statut='En Attente' AND ligne.Id_ndf=$id_ndf";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetch();
        return $result;
    }

    public static function lister($id_ndf)
    {
        $stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM note_de_frais WHERE Id_ndf = (?)");
        $stmt->execute([$id_ndf]);
        $result = $stmt->fetch();
        return $result;
    }

    /**
     * FIN HISTORIQUE
     */


    public static function newNote($idUser, $nom, $dd, $df,$dateDebut, $DateFin)
    {
        $sql = "INSERT INTO `note_de_frais` (`dateFin`, `Date`, `Mission`, `Id_Utilisateur`, `date_debut`, `date_fin`) VALUES ('".$DateFin."', '" . $dateDebut."' ,'".$nom . "', '" . $idUser . "', '" . $dd . "', '" . $df . "')";
        // echo $sql;	
        connectPdo::getObjPdo()->exec($sql);
    }

    public static function newFrais($Montant, $justificatif, $id_ndf, $Statut, $Type, $Detail, $Date, $dateFin)
    {
        $sql = "INSERT INTO `ligne` (`Id`, `Montant`, `Justificatif`, `Id_ndf`, `Statut`, `Type`, `Detail`, `Date`) VALUES (NULL,'$Montant', '".$id_ndf."_".$Detail.".".(pathinfo($_FILES['Justificatif']['name']))['extension']."', $id_ndf, '$Statut', '$Type', '$Detail', '$Date')";
		connectPdo::getObjPdo()->exec($sql);
        
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['Justificatif']) && $_FILES['Justificatif']['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['Justificatif']['size'] <= 1000000000000) {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['Justificatif']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'pdf', 'png', 'PDF'];
                if (in_array($extension, $allowedExtensions)) {

                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['Justificatif']['tmp_name'], 'uploads/' . basename($id_ndf . "_" . $Detail . "." . $extension));
                    sleep(3);
                    echo "<script>
                            document.getElementById('1').className = 'loader fadeOut';
                            document.getElementById('2').className = '';
                            document.getElementById('3').textContent = 'Envoyé avec succès';
                        </script>";
                }
            }
        }
    }
    // début de fonction Yvanne

    public static function listeUtilisateur()
    {
        $sql = "SELECT * FROM `utilisateur`;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function AllNdf()
    {
        $sql = "SELECT * FROM `note_de_frais`;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function AllLigne(){
        $sql = "SELECT * FROM `ligne`";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function status_valid_admin($id_ndf, $id_ligne, $Statut)
    {
        $result = $id_ndf . " " . $id_ligne . " " . $Statut;
        // if (true){
        //     $sql = "UPDATE `ligne` SET `Statut` = '$Statut' WHERE `ligne`.`Id` = $id_ligne AND `ligne`.`Id_ndf` = $id_ndf;";
        //     connectPdo::getObjPdo()->exec($sql);
        //     $result = "Ligne " . $Statut; 
        // }else{
        //     echo "Erreur, la validation n'a pas été prise en compte";
        // }
        return $result;
    }




    // fin de fonction Yvanne

    public static function listeFrais($id_ndf)
    {
        $sql = "SELECT * FROM `ligne` WHERE Id_ndf = " . $id_ndf;
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function supprimer($idUser, $idNdf)
    {
        $sql_Delete = "DELETE FROM `note_de_frais` WHERE Id_utilisateur=" . $idUser . " AND Id_ndf=" . $idNdf;
        connectPdo::getObjPdo()->exec($sql_Delete);
    }

    public static function supprimerFrais($id_ligne)
    {
        $stmt = connectPdo::getObjPdo()->prepare("SELECT Justificatif FROM `ligne` WHERE Id =(?)");
        $stmt->execute([$id_ligne]);
        $result = $stmt->fetch();
        unlink("uploads/" . $result['Justificatif']);

        $sql_Delete = "DELETE FROM `ligne` WHERE Id =" . $id_ligne;
        connectPdo::getObjPdo()->exec($sql_Delete);
    }

    public static function afficherModifierFrais($id_ligne)
    {
        $sql = "SELECT * FROM `ligne` WHERE Id = " . $id_ligne;
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }

    public static function modifierFrais($id_ligne)
    {
        $sql = "SELECT * FROM `ligne` WHERE Id = " . $id_ligne;
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetchAll();
        return $result;
    }
}
