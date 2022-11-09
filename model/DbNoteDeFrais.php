<?php
include 'connectPdo.php';

class DbNoteDeFrais{

    public static function newNote($idUser)
	{
        $sql = "INSERT INTO `note_de_frais` (`Date`, `Mission`, `Id_Utilisateur`) VALUES (NOW(), NULL, '".$idUser."')";
		connectPdo::getObjPdo()->exec($sql);
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
        $sql = "SELECT * FROM `ligne_fc` WHERE Id_ndf = ".$id_ndf;
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }

    public static function supprimer($idUser,$idNdf)
	{
        $sql_Delete = "DELETE FROM `note_de_frais` WHERE Id_utilisateur=".$idUser." AND Id_ndf=".$idNdf;
        connectPdo::getObjPdo()->exec($sql_Delete);
    }
	
}

?>