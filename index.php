<?php

require_once("include/fct.inc.php");
require_once ("include/class.pdoqcm.inc.php");
include("vues/v_entete.php");
session_start();
$pdo = PdoQcm::getPdoQcm();
$estConnecte = estConnecte();
if (!isset($_REQUEST['uc']) || !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
}

$uc = $_REQUEST['uc'];
switch ($uc) {
    case 'connexion': {
            include("controleurs/c_connexion.php");
            break;
        }
    case 'gererTheme' : {
            include("controleurs/c_gererTheme.php");
            break;
        }
    case 'gererQcm' : {
            include("controleurs/c_gererQcm.php");
            break;
        }
    case 'gererQuestion' : {
            include("controleurs/c_gererQuestion.php");
            break;
        }
    case 'gererReponse' : {
            include("controleurs/c_gererReponse.php");
            break;
        }
    case 'resultat' : {
            include("controleurs/c_resultat.php");
            break;
	}
}
?>