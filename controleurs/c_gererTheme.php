<?php
include("vues/v_sommaire.php");
$idUtilisateur = $_SESSION['idUtilisateur'];
$action = htmlspecialchars($_GET['action']);
$identifiant = '';
$libelle = '';

switch($action) {
    case 'saisirTheme':
        $lesThemes = $pdo->getLesThemes($identifiant, $libelle);
        include("vues/v_listeTheme.php");
        break;
    case 'validerMajTheme':
        include("vues/v_listeQCM.php");
        break;
    case 'validerCreationTheme':
        $libelle = htmlspecialchars($_POST['txtLibelleHF']);
        $pdo->creeNouveauTheme($libelle);
        
        include("vues/v_NouveauThemeValide.php");
        $lesThemes = $pdo->getLesThemes($identifiant, $libelle);
        include("vues/v_listeTheme.php");
        break;
    case 'supprimerTheme':
        $identifiant = htmlspecialchars($_GET['identifiant']);
        $pdo->supprimerTheme($identifiant);
        
        include("vues/v_SuppThemeValide.php");
        $lesThemes = $pdo->getLesThemes($identifiant, $libelle);
        include("vues/v_listeTheme.php");
        break;
}




?>