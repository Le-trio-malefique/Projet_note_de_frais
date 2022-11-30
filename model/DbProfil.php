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

	// HISTORIQUE
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
		$result = $objResultat->fetchAll();
		return $result;
    }
}

?>