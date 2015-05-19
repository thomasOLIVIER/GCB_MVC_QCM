<?php
include("vues/v_sommaire.php");
$idUtilisateur = $_SESSION['idUtilisateur'];
$action = htmlspecialchars($_GET['action']);
$identifiant = '';
$libelle = '';
$idTheme ='';

switch($action) {
    case 'selectionnerTheme': {
            $lesThemes = $pdo->getLesThemes($idVisiteur);
            $moisASelectionner = $lesCles[0];
            include("vues/v_listeDeroulanteTheme.php");
            break;
        }
    case 'saisirQcm':
        $lesQcm = $pdo->getLesQcm($identifiant, $libelle, $idTheme);
        include("vues/v_listeQCM.php");
        break;
    case 'validerMajQcm':
        break;
    case 'validerCreationQcm':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $pdo->creeNouveauQcm($libelle);
        $lesQcm = $pdo->getLesQcm($identifiant, $libelle, $idTheme);
        include("vues/v_listeQCM.php");
        break;
    case 'supprimerQcm':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerQcm($identifiant);
        $lesQcm = $pdo->getLesQcm($identifiant, $libelle, $idTheme);
        include("vues/v_listeQCM.php");
        break;
}



?>
