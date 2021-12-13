function verifActionCompte(form){
	if (isset(document.forms[form].elements['debit'])){
		var solde=document.forms[form].elements['solde'].value;
		var decouvert=document.forms[form].elements['decouvert'].value;
		var montant=document.forms[form].elements['montant'].value;
		if(isNaN(montant) || montant.startsWith("-")){
			return false;
		}
		if(solde-montant>decouvert){
			return true;
		}
		return false;
	}
	else if(isset(document.forms['formAffCom'].elements['credit'])){
		return true;
	}
}

function afficheDecouvertEtSolde(compte,decouvert,solde){
	document.forms['formAffCom'].elements['compte'].value=compte;
	document.forms['formAffCom'].elements['decouvert'].value=decouvert;
	document.forms['formAffCom'].elements['solde'].value=solde;
}

/*
faire des fonctions pour vérifier le formats de chaque input
(comme dans le tp avec le colorie)
faire le onsubmit pour stopper l'envoie si c'est mauvais
*/

function popsynthese(id,nomcli,prenomcli,idcli,datenaissance,profession,situationfamcli,numtelcli,adressecli,login,nomcompte,solde,nomcontrat,tarifmensuel){
	var cont = "</br> <p> Client : "+nomcli+" "+prenomcli+"   |   Identifiant : "+idcli+"</p><p> Profession : "+profession+"   |   Situation familiale : "+situationfamcli+"</p><p> Contact : joignable au "+numtelcli+" et habitant au "+adressecli+"</p><p> Conseillé :"+login+"</p>";
	//trouver solution tout les contrats
}

/*function afficherSyntheseRDV($tabclient,$tabcontrat,$tabcompte,$listePJ,$motif){
    afficherSynthese($tabclient,$tabcontrat,$tabcompte);
    $contenu2=$contenu;
    $contenu2.="<p> Motif RDV : ".$motif."   |   Liste des pièces justificatives : ".$listePJ;
}

function afficherSynthese($tabclient,$tabcontrat,$tabcompte){
    if (!isset($contenu)){
        $contenu="";
    }
    foreach($tabclient as $ligne){
        $contenu.="</br> <p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : ".$ligne->siruationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        $contenu.="<p> Conseillé :".$ligne->login."</p>";
        break;
    }
    foreach($tabcompte as $ligne){
        $contenu.="<p> Compte : ".$ligne->nomCompte." avec un solde de ".$ligne->solde."</p>";
    }
    foreach($tabcontrat as $ligne){
        $contenu.="<p> Contrat : ".$ligne->nomContrat."</p>";
    }
}
*/