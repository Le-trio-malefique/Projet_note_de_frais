<?php
include 'connectPdo.php';

class DbNoteDeFrais{

    public static function newNote($idUser)
	{
        $sql = "INSERT INTO `note_de_frais` (`Date`, `Id_FC`, `Id_FK`, `Id_Utilisateur`) VALUES (NOW(), NULL, NULL, '".$idUser."')";
		connectPdo::getObjPdo()->exec($sql);
    }

    public static function lister($idUser)
	{
        $sql = "SELECT * FROM `note_de_frais` WHERE Id_utilisateur=".$_SESSION['id'];
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }
	
}

?>