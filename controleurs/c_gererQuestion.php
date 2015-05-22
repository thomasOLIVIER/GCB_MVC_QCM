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
    case 'saisirQuestion':
        $idQcm = htmlspecialchars($_GET['identifiant']);
        $lesQuestions = $pdo->getLesQuestions($idQcm);
        include("vues/v_listeQuestion.php");
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
    case 'validerCreationQuestion':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $idQcm = htmlspecialchars($_GET['identifiant']);
        $pdo->creeNouvelleQuestion($libelle, $idQcm);
        
        $lesQuestions = $pdo->getLesQuestions($idQcm);
        include("vues/v_listeQuestion.php");
        break;
    case 'supprimerQuestion':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerQuestion($identifiant);
        
        $idQcm = htmlspecialchars($_GET['identifiant']);
        $lesQuestions = $pdo->getLesQuestions($idQcm);
        include("vues/v_listeQuestion.php");
        break;
}


?>
?>