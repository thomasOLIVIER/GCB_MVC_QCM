<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'saisirFraisForfaitises':{
		include("vues/v_fraisForfaitises.php");
		break;
	}
	case 'saisirFraisHorsForfait':{
		include("vues/v_fraisHorsForfait.php");
		break;
	}
}
?>