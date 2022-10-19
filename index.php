<?php
session_start();

include 'vue/enTete.php';
include 'vue/menu.php';	

if(isset($_GET['ctl']))
{
	switch($_GET['ctl']){

		case 'gestionnaire':
			include 'ctl/ctlGestionnaire';
			break;

		case 'utilisateur':
			include 'ctl/ctlUtilisateur.php';
			break;

		case 'notedefrais':
			include 'ctl/ctlNoteDeFrais.php';
			break;
	}
}
include 'vue/pied.php';

?>        				 
         
