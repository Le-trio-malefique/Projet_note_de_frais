<?php
include 'connectPdo.php';

class DbNoteDeFrais{

    public static function newNote($idUser)
	{
        $sql = "INSERT INTO `note_de_frais` (`Date`, `Mission`, `Id_Utilisateur`) VALUES (NOW(), NULL, '".$idUser."')";
		connectPdo::getObjPdo()->exec($sql);
    }

    public static function newFrais($Montant, $justificatif, $id_ndf, $Statut, $Type, $Detail, $Date)
    {
        $sql = "INSERT INTO `ligne` (`Id`, `Montant`, `Justificatif`, `Id_ndf`, `Statut`, `Type`, `Detail`, `Date`) VALUES (NULL,'$Montant', '".$_FILES['Justificatif']['name']."', $id_ndf, '$Statut', '$Type', '$Detail', '$Date')";
		connectPdo::getObjPdo()->exec($sql);
        
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['Justificatif']) && $_FILES['Justificatif']['error'] == 0)
        {
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['Justificatif']['size'] <= 1000000)
                {
                        // Testons si l'extension est autorisée
                        $fileInfo = pathinfo($_FILES['Justificatif']['name']);
                        $extension = $fileInfo['extension'];
                        $allowedExtensions = ['jpg', 'jpeg', 'pdf', 'png'];
                        if (in_array($extension, $allowedExtensions))
                        {
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['Justificatif']['tmp_name'], 'uploads/'.basename($_FILES['Justificatif']['name']));
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