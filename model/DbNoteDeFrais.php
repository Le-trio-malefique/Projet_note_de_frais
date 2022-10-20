<?php
include 'connectPdo.php';

class DbNoteDeFrais{

    public static function lister()
	{
        $sql = "insert into note_de_frais (Date_ndf, Id_utilisateur) values ( NOW(),'".$idUser."')";
		connectPdo::getObjPdo()->exec($sql);
    }

    public static function newNote($idUser)
	{
        $sql = "SELECT * FROM `note_de_frais` WHERE Id_utilisateur=".$_SESSION['id'];
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
    }
	
}

?>