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
    case 'saisirReponse':
        $idQuestion = htmlspecialchars($_GET['identifiant']);
        $lesReponses = $pdo->getLesReponses($idQuestion);
        include("vues/v_listeReponse.php");
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
    case 'validerCreationReponse':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $exacte = htmlspecialchars($_POST['txtLibelleHF2']);
        $idQuestion = htmlspecialchars($_GET['identifiant']);
        $pdo->creeNouvelleReponse($libelle, $exacte, $idQuestion);
        
        $lesReponses = $pdo->getLesReponses($idQuestion);
        include("vues/v_listeReponse.php");
        break;
    case 'supprimerReponse':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerReponse($identifiant);
        
        $idQuestion = htmlspecialchars($_GET['identifiant']);
        $lesReponses = $pdo->getLesReponses($idQuestion);
        include("vues/v_listeReponse.php");
        break;
}


?>
?>