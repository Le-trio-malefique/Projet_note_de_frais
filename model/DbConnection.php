<?php
include 'connectPdo.php';

class DbConnection{
	
	public static function connectUser($email,$password)
	{
		$sql = "SELECT * FROM `utilisateur`, `vehicule` WHERE utilisateur.Id = vehicule.Id_utilisateur AND Mail='$email' AND Mdp='$password'";
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
	}

	public static function newUser($email,$password)
	{
		$sql = "insert into utilisateur (Mail, Mdp) values ('".$email."','".$password."')";
		connectPdo::getObjPdo()->exec($sql);
	}
}

?>