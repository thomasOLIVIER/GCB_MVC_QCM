<div id="bande"> 
<!-- Division pour le sommaire -->

<img src="./images/logo.png" class="displayed" id="img" alt="Laboratoire Galaxy-Swiss Bourdin" title="Laboratoire Galaxy-Swiss Bourdin" />

<h2>Visiteur :<br><?php echo "Bienvenue"."  ".$_SESSION['prenom']."  ".$_SESSION['nom']  ?></h2> 
<div id='cssmenu'>
  
<ul>
    <li class='active'><a href='index.php?uc=connexion&action=valideConnexion'><span>Accueil</span></a></li>
   <li><a href="index.php?uc=selectionFrais&action=saisirFraisHorsForfait">Saisir Frais hors forfait</a></li>
   <li><a href="index.php?uc=selectionFrais&action=saisirFraisForfaitises">Saisir Frais forfaitises</a></li>
   <li><a href="#">Consulter Frais</a></li>
   <li>
        <a href="index.php?uc=connexion&action=deconnexion">Se déconnecter</a>
      </li>
</ul>
</div>
</div>