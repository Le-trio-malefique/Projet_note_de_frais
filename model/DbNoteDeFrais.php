<?php
include 'connectPdo.php';

class DbNoteDeFrais{
    /**
     * HISTORIQUE
     */
    public static function list_ndf(){ // rentrer en paramètre le 0 ou 1
        // Function all_ndf
        $all_ndf = DbNoteDeFrais::all_ndf($_SESSION['id']);
        // Function is_ndf_valid
        $valid_ndf = array();
        foreach ($all_ndf as $id_ndf) {
            if(DbNoteDeFrais::is_ndf_valid($id_ndf[0])[0] == 0){ // <----passer en param d'entrée 
                $valid_ndf[] += $id_ndf[0];
            }
        }
        return $valid_ndf;
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

    public static function lister_historique($id_ndf)
    {
        $sql = "SELECT * FROM note_de_frais WHERE Id_ndf = $id_ndf;";
        $objResultat = connectPdo::getObjPdo()->query($sql);
        $result = $objResultat->fetch();
        return $result;
    }

    /**
     * FIN HISTORIQUE
     */


    public static function newNote($idUser)
	{
        $sql = "INSERT INTO `note_de_frais` (`Date`, `Mission`, `Id_Utilisateur`) VALUES (NOW(), NULL, '".$idUser."')";
		connectPdo::getObjPdo()->exec($sql);
    }

    public static function newFrais($Montant, $justificatif, $id_ndf, $Statut, $Type, $Detail, $Date)
    {
        $sql = "INSERT INTO `ligne` (`Id`, `Montant`, `Justificatif`, `Id_ndf`, `Statut`, `Type`, `Detail`, `Date`) VALUES (NULL,'$Montant', '".$id_ndf."_".$Detail."_".$_FILES['Justificatif']['name']."', $id_ndf, '$Statut', '$Type', '$Detail', '$Date')";
		connectPdo::getObjPdo()->exec($sql);
        
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['Justificatif']) && $_FILES['Justificatif']['error'] == 0)
        {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['Justificatif']['size'] <= 1000000000000)
                {
                        // Testons si l'extension est autorisée
                        $fileInfo = pathinfo($_FILES['Justificatif']['name']);
                        $extension = $fileInfo['extension'];
                        $allowedExtensions = ['jpg', 'jpeg', 'pdf', 'png', 'PDF'];
                        if (in_array($extension, $allowedExtensions)){
                            
                            /*echo "<div class='justify-content-center d-flex pt-5'>
                                    <div class='card bg-success' style='min-width : 50vw;'>
                                        <h3 class='text-center text-white'>Envoyé avec succès</h3>
                                    </div>
                                </div>";*/

                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['Justificatif']['tmp_name'], 'uploads/'.basename($id_ndf."_".$Detail."_".$_FILES['Justificatif']['name']));
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

    public static function lister($idUser)
	{
        $sql = "SELECT * FROM `note_de_frais` WHERE Id_utilisateur=".$idUser;
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }

    public static function listeFrais($id_ndf)
	{
        $sql = "SELECT * FROM `ligne` WHERE Id_ndf = ".$id_ndf;
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }

    public static function supprimer($idUser,$idNdf)
	{
        $sql_Delete = "DELETE FROM `note_de_frais` WHERE Id_utilisateur=".$idUser." AND Id_ndf=".$idNdf;
        connectPdo::getObjPdo()->exec($sql_Delete);
    }

    public static function supprimerFrais($id_ligne)
	{
        $sql_Delete = "DELETE FROM `ligne` WHERE Id =".$id_ligne;
        connectPdo::getObjPdo()->exec($sql_Delete);
    }

    public static function afficherModifierFrais($id_ligne)
    {
        $sql = "SELECT * FROM `ligne` WHERE Id = ".$id_ligne;
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }

    public static function modifierFrais($id_ligne)
    {
        $sql = "SELECT * FROM `ligne` WHERE Id = ".$id_ligne;
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }
	
}

?>