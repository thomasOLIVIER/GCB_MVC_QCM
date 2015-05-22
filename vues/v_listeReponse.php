<div id="contenu">
    <form id="frmCreationFrais" action="index.php?uc=gererReponse&action=validerCreationReponse&identifiant=<?php echo $_GET['identifiant']?>" method="post">
        <div class="corpsForm">
            <fieldset>
                <legend>Nouvelle réponse</legend>
              
                <p>
                    <label for="txtLibelleHF">Libellé</label>
                    <input type="text" id="txtLibelleHF" name="txtLibelleHF" size="70" maxlength="256" value="" />
                </p>
                <p>
                    <label for="txtLibelleHF">Exacte</label>
                    <input type="text" id="txtLibelleHF2" name="txtLibelleHF2" size="70" maxlength="256" value="" />
                </p>

            </fieldset>
        </div>
        
        <div class="piedForm">
            <p>
                <input id="cmdAjouter" type="submit" value="Ajouter" size="20" />
                <input id="cmdEffacer" type="reset" value="Effacer" size="20" />
            </p> 
        </div>
    </form>
<table class="listeLegere">
  	   <caption>Administration des réponses
       </caption>
             <tr>
                <th class="libelle">Libellé</th>
                <th class="libelle">Exacte</th>
                <th class="action">Supprimer</th>
             </tr>
          
    <?php    
	    foreach( $lesReponses as $uneReponse) 
		{
			$libelle = $uneReponse['libelle'];
                        $exacte = $uneReponse ['exacte'];
                        $id = $uneReponse['identifiant'];
	?>		
            <tr>
                <td><?php echo $libelle?></td>
                <td><?php echo $exacte?></td>
                <td><a href="index.php?uc=gererReponse&action=supprimerReponse&identifiant=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce QCM?');"><img src=".\images\icones\b_drop1.png"/></a></td>
             </tr>
	<?php		 
          
          }
	?>
</table>

</div>	


