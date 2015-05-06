
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitises </caption>
        <tr>
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>
		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td class="qteForfait"><?php echo $quantite?> </td>

		 <?php
          }
		?>
		</tr>

    </table>
	<br /><br />
	<h2>Ajouter à la fiche de frais</h2>
	
<div class="corpsForm">
<!--<form action = "traitement.php" method="post"><br/><!--si on enlève la ligne là, suppression de toute la table-->
<label for="forfaitEtape">Forfait Etape</label> <input  type = "text" name = "Forfait Etape"><br/><br/>
<label for="forfaitKilometrique">Frais Kilom&eacute;trique</label> <input type = "text" name = "Frais Kilométrique"><br/><br/>
<label for="nuiteeHotel">Nuit&eacute;e H&ocirc;tel</label> <input type = "text" name = "Nuitée Hôtel"><br/><br/>
<label for="repasRestaurant">Repas Restaurant</label> <input type = "text" name = "Repas Restaurant">
<br /><br />
<center>
<input id = "ok" type = "submit" value = "Valider"> 
<input id="delete" type="submit" value="Effacer">
</center>
</div>

<br /><br /><br /><br />

  	<table class="listeLegere">
  	   <caption>Descriptif des eléments hors forfait - <?php 
		switch($nbJustificatifs)
		{
			case 0 : echo 'Aucun justificatif reçu'; break;
			case 1 : echo $nbJustificatifs.' justificatif reçu'; break;
			default : echo $nbJustificatifs.' justificatifs reçus'; break;
		}?>
       </caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">libelle</th>
                <th class='montant'>Montant</th>
				<th class="suppression">Suppression</th>
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
			//$suppression = $unFraisHorsForfait['suppression'];
		?>

             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
				<td><!--ajouté par tibo -->
				<form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">
				<input type="submit" name="delete" value="Supprimer" onclick="supLesFraisHorsForfait">
				
				</td>
             </tr>
        <?php 
          }
		?>
		
    </table>
<div class="corpsForm">
<form action = "traitement.php" method="post"><br/>
<label for="date">Date (jj/mm/aaaa) :</label> <input  type = "date" name = "Date"><br/><br/>
<label for="libelle">Libell&eacute; :</label><br />
<input size="100" type ="texte" name="Libelle"><br/>
<label for="montant">Montant :</label> <input type = "text" name = "Montant"><br/><br/>
<center>
<input id = "ok" type = "submit" value = "Ajouter">
<input id = "delete" type = "submit" value = "Effacer">
</center>
<br/>
</div>

  </div>
  </div>
 













