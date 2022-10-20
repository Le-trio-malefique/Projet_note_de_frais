<?php
include 'connectPdo.php';

class DbProfil{

    public static function ajoutvehicule($marque, $modele, $carburant, $cylindre, $id)
	{
        $sql = "INSERT INTO `vehicule` (`Id`, `Marque`, `Modele`, `Carburant`, `Cylindre`, `Id_utilisateur`) VALUES ('".$marque."', '".$modele."', '".$carburant."', '".$cylindre."', '".$id."')";
		connectPdo::getObjPdo()->exec($sql);
    }
	
}

?>