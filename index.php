<?php
session_start();

include 'vue/enTete.php';
include 'vue/menu.php';	

if(isset($_GET['ctl']))
{
	switch($_GET['ctl']){

		case 'x':
			include 'ctl/ctlConnection';
			break;

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
else{echo "<div class='h-100 w-100'><h1 class='text-center mt-5'>Bienvenue</h1></div>";}
include 'vue/pied.php';

?>        				 
         
