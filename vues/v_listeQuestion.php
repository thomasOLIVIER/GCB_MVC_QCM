<div id="contenu">
    <form id="frmCreationFrais" action="index.php?uc=gererQuestion&action=validerCreationQuestion&identifiant=<?php echo $_GET['identifiant']?>" method="post">
        <div class="corpsForm">
            <fieldset>
                <legend>Nouvelle question</legend>
              
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
<table class="listeLegere">
  	   <caption>Administration des Questions
       </caption>
             <tr>
                <th class="libelle">Libellé</th>   
                <th class="action">Supprimer</th>
                <th class="action">Modifier</th> 
             </tr>
          
    <?php    
	    foreach( $lesQuestions as $uneQuestion) 
		{
			$libelle = $uneQuestion['libelle'];
                        $id = $uneQuestion['identifiant'];
	?>		
            <tr>
                <td><?php echo $libelle?></td>
                <td><a href="index.php?uc=gererQuestion&action=supprimerQuestion&identifiant=<?php echo $id ?>" 
				onclick="return confirm('Voulez-vous vraiment supprimer ce QCM?');"><img src=".\images\icones\b_drop1.png"/></a></td>
                <td><a href="index.php?uc=gererReponse&action=saisirReponse&identifiant=<?php echo $id ?>" ><img src=".\images\icones\b_edit1.png"/></a></td>
             </tr>
	<?php		 
          
          }
	?>
</table>

</div>	


