    <!-- Division pour le sommaire -->

<div id="menuGauche">
    <div id="infosUtil">

        <h2>

        </h2>

    </div>
    <ul id="menuList">
        <li>
            <?php
            if ($_SESSION['etat'] == 'Formateur') {
                ?>
            <h2>Vous êtes connecté en tant que formateur :</h2><br/>
                <h2><?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom']; ?></h2>
                <br/>
                <br/>    
          
                
                                <ul class="ca-menu">
                    <li>
                        <a href="index.php?uc=gererTheme&action=saisirTheme" title="Administration des thèmes">
                            <div class="ca-content">
                                <h2 class="ca-main">Gérer</h2>
                                <h3 class="ca-sub">Thèmes, QCM</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?uc=resultat&action=selectionnerMois">
                            <div class="ca-content">
                                <h2 class="ca-main">Consultation</h2>
                                <h3 class="ca-sub">resultats par employé</h3>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="ca-content">
                                <h2 class="ca-main">Statistique d'utilisation</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
                 
                    <li>
                        <a href="index.php?uc=connexion&action=deconnexion">
                            <div class="ca-content">
                                <h2 class="ca-main">D&eacute;connexion</h2>
                                <h3 class="ca-sub"></h3>
                            </div>
                        </a>
                    </li>
                </ul>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
                

            <?php
        }
        if ($_SESSION['etat'] == 'ResponsableDeService') {
            ?>
            Vous êtes connecté en tant que responsable de service de formation:<br/>
            <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?>
            <br/>
            <br/>
            </li>
            <li class="smenu">
                <a href="index.php?uc=gererFrais&action=saisirFrais" title="Administration des thèmes">Administration des thèmes</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation des resultats par employé">Consultation des resultats par employé</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Statistique d'utilisation">Statistique d'utilisation</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Statistique formateur">Statistique formateur</a>
            </li>
            <li class="smenu">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">D&eacute;connexion</a>
            </li>
            <?php
        }
        if ($_SESSION['etat'] == 'Employe') {
            ?>
            Vous êtes connecté en tant qu'employé(e):<br/>
            <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?>
            <br/>
            <br/>
            </li>
            <li class="smenu">
                <a href="index.php?uc=validationFicheFrais&action=selectionnerVisiteur" title="Passer un QCM">Passer un QCM</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=suiviPaiement&action=selectionnerFrais" title="Consulter résultat">résultat</a>
            </li>
            <li class="smenu">
                <a href="index.php?uc=suiviPaiement&action=selectionnerFrais" title="Mes statistiques">Mes statistiques</a>
            </li>
            <li class="smenu">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">D&eacute;connexion</a>
            </li>
            <?php
        }
        ?>
        
    </ul>
</div>

