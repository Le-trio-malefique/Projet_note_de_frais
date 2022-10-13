<?php
session_start();

include 'vue/enTete.php';
include 'vue/menu.php';	

if(isset($_POST['ctl']))
{
	switch($_POST['ctl']){
		
			case 'Gestionnaire':
                include 'ctl/ctlGestionnaire';
                break;


			 case 'utilisateur':
			 include 'ctl/ctlUtilisateur.php';
			 break;

			 
		}
	
}
include 'vue/pied.php';

?>        				 
         
