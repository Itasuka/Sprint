function verifActionCompte(){
	var montant=document.getElementById('montant').value;
	var decouvert=document.getElementById('decouvert').value;
	var solde=document.getElementById('solde').value;
	if(isNaN(montant) || montant.startsWith('-')){
		document.getElementById('montant').style.backgroundColor="#fba";
		return false;
	}
	else{
	return true;
}
}

function afficheDecouvertEtSolde(compte,decouvert,solde){
	document.getElementById('compte').value=compte;
	document.getElementById('decouvert').value=decouvert;
	document.getElementById('solde').value=solde;
}


/*
L'agent se connecte et :
• fait un dépôt de 100 euros sur le compte type C de DUPONT et voit un solde à 100 : 0,5
• essaye de faire un débit de 500 euros à DUPONT sur son compte type C mais visualise un
blocage pour dépassement de découvert autorisé : 2
• augmente a 800 le montant de découvert de DUPONT sur son compte type C : 0.5
• fait un débit de 500 à DUPONT sur son compte type C et visualise dans la synthèse un solde
mis à jour à -400 : 1
*/