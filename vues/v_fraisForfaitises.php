 <div id="contenu">
	<form action="index.php?uc=gererFrais&action=saisirFrais" method="post">
	<h2>Frais forfaitises</h2>
	<div id ="saisie" style="width:25%">
		<table border ="10">
			<tr>
				<td>Montant</td>
				<td><input id="ok" type="text" value="Montant réglé" style="color:lightgrey" onFocus="this.value=''" onblur="if(this.value=='')this.value='Montant réglé'"/><br/></td>
			</tr>
				<tr>
				<td>Date</td>
				<td><input id="annuler" type="text" value="Date du règlement" style="color:lightgrey" onFocus="this.value=''" onblur="if(this.value=='')this.value='Date du règlement'"/><br/></td>
			</tr>
				<tr>
				<td>Libelle</td>
				<td><input id="annuler" type="text" value="Descriptif" style="color:lightgrey" onFocus="this.value=''" onblur="if(this.value=='')this.value='Descriptif'"/><br/></td>
			</tr>
		</table>
		<br/>
		<br/>
		<td colspan=2><input id="Valider" type="submit" text="ok"></td>
	</div>
</div>