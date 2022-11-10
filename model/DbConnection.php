<?php
include 'connectPdo.php';

class DbConnection{
	
	public static function connectUser($email,$password)
	{
		$sql = "SELECT * FROM `utilisateur` WHERE Mail='$email' AND Mdp='$password'";
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();

		return $result;
	}

	public static function getVehicule($id)
	{
		$sql_v ="SELECT * FROM `vehicule` WHERE $id = vehicule.Id_utilisateur";
		$objResultat = connectPdo::getObjPdo()->query($sql_v);
		if($objResultat != null){
			$result_v = $objResultat->fetchAll();
			return $result_v;
		} 
		
	}

}

?>