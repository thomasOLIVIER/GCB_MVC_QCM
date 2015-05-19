<?php
include("vues/v_sommaire.php");
$idUtilisateur = $_SESSION['idUtilisateur'];
$mois = getMois(date("d/m/Y"));
$numAnnee = substr($mois,0,4);
$numMois = substr($mois,4,2);
$action = htmlspecialchars($_GET['action']);
$identifiant = '';
$libelle = '';

switch($action) {
    case 'saisirTheme':
        if($pdo->estPremierFraisMois($idUtilisateur, $mois)) {
            $pdo->creeNouvellesLignesFrais($idUtilisateur, $mois);
        }
        break;
    case 'validerMajTheme':
        $lesFrais = $_POST['txtIdFrais'];

        if(lesQteFraisValides($lesFrais)) {
            $pdo->majFraisForfait($idUtilisateur, $mois, $lesFrais);
        } else {
            ajouterErreur("Les valeurs des frais doivent être numériques");
            include("vues/v_erreurs.php");
            unset($_SESSION['erreurs']);
        }
        break;
    case 'validerCreationTheme':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $pdo->creeNouveauTheme($libelle);
        break;
    case 'supprimerTheme':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerTheme($identifiant);
        break;
}

$lesThemes = $pdo->getLesThemes($identifiant, $libelle);
include("vues/v_listeTheme.php");

?>
?>