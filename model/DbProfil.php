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

	public static function all_ndf()
	{
		$sql = "SELECT id, id_ndf FROM ligne, WHERE id;";
		$objResultat = connectPdo::getObjPdo()->query($sql);
		$result = $objResultat->fetchAll();
		return $result;
	}

	public static function is_ndf_valid($id_ligne)
	{
		$sql = "SELECT IF( (SELECT COUNT(ligne.$id) FROM ligne WHERE ligne.Statut != 'En Attente') = (SELECT COUNT(ligne.$id) FROM ligne),(SELECT DISTINCT ligne.id_ndf FROM ligne), '')";

	}
}

?>