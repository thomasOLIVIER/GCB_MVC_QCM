<div id="contenu">
	<form action="index.php?uc=gererFrais&action=saisirFrais" method="post">
	<h2>Frais hors forfait</h2>
	<div id ="saisie" style="width:25%">
		<table border ="10">
			<tr>
				<td>Montant</td>
				<td><input style="color:lightgrey" id="input1" type="text" value="Montant réglé"/><br/></td>
			</tr>
				<tr>
				<td>Date</td>
				<td><input style="color:lightgrey" id="input2" type="text" value="Date du règlement"/><br/></td>
			</tr>
				<tr>
				<td>Libelle</td>
				<td><input style="color:lightgrey" id="input3" type="text" value="Descriptif"/><br/></td>
			</tr>
		</table>
		<br/>
		<br/>
		<td colspan=2><input id="Valider" type="submit" text="ok"></td>
		
	</div>
</div>
</form>

<script>

	//Récupération des objets sur lesquels on veut faire les tests
	var input1 = document.getElementById('input1');
	var input2 = document.getElementById('input2');
	var input3 = document.getElementById('input3');
	
	//------Vidage des champs lors du click + police en noir------//
	input1.onclick=function(){
		if(input1.value!="")
		{
			input1.value=""
			input1.style="color:black";
		}
		
	};
	
	input2.onclick=function(){
		if(input2.value!="")
		{
			input2.value="";
			input2.style="color:black";
		}
	};
	
	input3.onclick=function(){
		if(input3.value!="")
		{
			input3.value=""
			input3.style="color:black";
		}
	};
	
	//------Remplissage des champs si vide + police en gris------//
	input1.onblur=function(){
		if(input1.value=="")
		{
			input1.value="Montant"
			input1.style="color:LightGrey";
		}
		
	};
	
	input2.onblur=function(){
		if(input2.value=="")
		{
			input2.value="Date"
			input2.style="color:LightGrey";
		}
	};
	
	input3.onblur=function(){
		if(input3.value=="")
		{
			input3.value="Libelle"
			input3.style="color:LightGrey";
		}
	};
</script>