<div id="contenu">
<table class="listeLegere">
  	   <caption>Administration des QCM
       </caption>
             <tr>
                <th class="libelle">Libellé</th>   
                <th class="action">Supprimer</th>
                <th class="action">Modifier</th> 
             </tr>
          
    <?php    
	    foreach( $lesQcm as $unQcm) 
		{
			$libelle = $unQcm['libelle'];
                        $id = $unQcm['identifiant'];
	?>		
            <tr>
                <td><?php echo $libelle?></td>
                <td><a href="index.php?uc=gererQcm&action=supprimerQcm&identifiant=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce QCM?');"><img src=".\images\icones\b_drop.png"/></a></td>
                <td><a href="index.php?uc=gererQcm&action=validerMajQcm&identifiant=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment modifier ce QCM?');"><img src=".\images\icones\b_edit.png"/></a></td>
             </tr>
	<?php		 
          
          }
	?>
</table>

    <form id="frmCreationFrais" action="index.php?uc=gererQcm&action=validerCreationQcm" method="post">
        <div class="corpsForm">
            <fieldset>
                <legend>Nouveau QCM</legend>
              
                <p>
                    <label for="txtLibelleHF">Libellé</label>
                    <input type="text" id="txtLibelleHF" name="txtLibelleHF" size="70" maxlength="256" value="" />
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
</div>	


