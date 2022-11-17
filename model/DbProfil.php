<?php
include 'connectPdo.php';

class DbProfil{

    public static function ajoutvehicule($marque, $modele, $carburant, $cylindre, $id)
	{
        $sql = "INSERT INTO `vehicule` (`Marque`, `Modele`, `Carburant`, `Cylindre`, `Id_utilisateur`) VALUES ('".$marque."', '".$modele."', '".$carburant."', '".$cylindre."', '".$id."')";
		connectPdo::getObjPdo()->exec($sql);

        $sql2 = "select * FROM `vehicule` where `Id_utilisateur` =".$_SESSION['id'];
		$objResultat = connectPdo::getObjPdo()->query($sql2);
		$result_vehicule = $objResultat->fetchAll();
		return $result_vehicule;

    }

	public static function modifiervehicule($marque, $modele, $carburant, $cylindre, $id)
	{
		$sql = "UPDATE `vehicule` SET `Marque` = '$marque', `Modele` = '$modele', `Carburant` = '$carburant', `Cylindre` = '$cylindre' WHERE Id_utilisateur = $id";
		connectPdo::getObjPdo()->exec($sql);
	}
<<<<<<< HEAD

	public static function all_ndf()
	{
		$sql = "SELECT id, id_ndf FROM ligne;"
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
	}

	public static function id_ndf($id)
	{
		$sql = "SELECT note_de_frais.Id_ndf FROM note_de_frais WHERE note_de_frais.Id_Utilisateur = $id;"
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
	}
=======
	
>>>>>>> parent of 8243e11 (model ndf historique)
}

?>