<?php
include("vues/v_sommaire.php");
$idUtilisateur = $_SESSION['idUtilisateur'];
$action = htmlspecialchars($_GET['action']);


switch($action) {

    case 'saisirQcm':
        $idTheme = htmlspecialchars($_GET['identifiant']);
        $lesQcm = $pdo->getLesQcm($idTheme);
        include("vues/v_listeQcm.php");
        break;
    case 'validerMajQcm':
        break;
    case 'validerCreationQcm':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $idTheme = htmlspecialchars($_GET['identifiant']);
        $pdo->creeNouveauQcm($libelle, $idTheme);
        
        $lesQcm = $pdo->getLesQcm($idTheme);
        include("vues/v_listeQcm.php");
        break;
    case 'supprimerQcm':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerQcm($identifiant);
        
        $idTheme = htmlspecialchars($_GET['identifiant']);
        $lesQcm = $pdo->getLesQcm($idTheme);
        include("vues/v_listeQcm.php");
        break;
}



?>
