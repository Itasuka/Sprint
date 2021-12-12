<?php
function affichierpageDirecteur(){
	$contenue.='';
	require_one('gabarit_Directeur.php')
}
function affichierpageAgent(){
	$contenue.='';
	require_one('gabarit_Agent.php')
}
function affichierpageConseiller(){
	$contenue.='';
	require_one('gabarit_conseillerclient.php')
}
function afficherStat1($date1,$date2,$resultat){
	$contenue.=le nombre de contrat souscrit entre <?=$date1> et <?=$date2> est de <?=$resultat>;
	require_one('gabarit_Directeur.php')
}
function afficherStat2($date1,$date2,$resultat){
	$contenue.=le nombre de rdv pris par des agents entre <?=$date1> et <?=$date2> est de <?=$resultat>;
	require_one('gabarit_Directeur.php')
}
function afficherStat3($date1,$resultat){
	$contenue.=le nombre de client de la banque du <?=$date1> est de <?=$resultat>;
	require_one('gabarit_Directeur.php')
}
function afficherStat3($date1,$resultat){
	$contenue.=la solde total de tous les client de la banque du <?=$date1> est de <?=$resultat>;
	require_one('gabarit_Directeur.php')
}
function afficheridentifiantClient($IdClient,$Date){
	$contenue.=$contenueClient
	$contenue.='<p>'.information client .'</p>'
	foreach ($ligne as $contenue) {
		$contenue.'<p>'. $ligne.'</p>'
	}
}
function afficherPlanning1jour1employe($tab){
$h=8
$tailletabcase2 = sizeof($tab[1])
foreach($tab[0] as $ligne){
    $contenu="<table> <tr> <th colspan='2'>Planning de '. $tab[0]->nomemploye.' '.$tab[0]->prenomemploye .' le '.$tab[0]->dateevenement.'</th> </tr> <tr>";
    break;
    }
    foreach ($tab[0] as $planning){
        $contenu.="<tr> <th>".$h."h00 </th>";
        if (($planning->heure)-8==$h){
            $listedespieces=$planning->nompieces;
            $motif=$planning->nommotif;
            $categorie=$planning->categorierdv;
            $idclient=$planning->idcli;
            if ($idclient==null){
                if ($categorie=="tache"){
                    $contenu.="<td> Tâches administratives </td> </tr>";
                }else{
                    $contenu.="<td> <a href=# onclick= 'poppassynthese($h,$listedespieces,$motif)>Informations</a> <div id=$h></div> </td> </tr>";
                }
            } else{
                for ($j=0; $j<$tailletabcase2; $j++){
                    if ($tab[1][$j][0]==$idclient){
                        $contenu.="<td> <a href=# onclick='popsynthese($h,$tab[1][$j][1],$tab[1][$j][2],$tab[1][$j][3],$listedespieces,$motif)'>Informations RDV</a> <div id=$h></div> </td> </tr>";
            }
        } $h=$h++;
     } 
}

function afficherSyntheseRDV($tabclient,$tabcontrat,$tabcompte,$listePJ,$motif){
    function afficherSynthese($tabclient,$tabcontrat,$tabcompte);
    $contenu2=$contenu;
    $contenu2.="<p> Motif RDV : ".$motif."   |   Liste des pièces justificatives : ".$listePJ;
}

function afficherSynthese($tabclient,$tabcontrat,$tabcompte){
    if ($contenu==null){
        $contenu="";
    }
    foreach($tabclient as $ligne){
        $contenu.="</br> <p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : "ligne->siruationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        $contenu.="<p> Conseillé :".$ligne->login."</p>";
        break
    }
    foreach($tabcompte as $ligne){
        $contenu.="<p> Compte : ".$ligne->nomCompte." avec un solde de ".$ligne->solde."</p>";
    }
    foreach($tabcontrat as $ligne){
        $contenu.="<p> Contrat : ".$ligne->nomContrat."</p>";
    }

    
function afficherErreur($erreur){
    $contenu='<p>'$erreur'</p>';
    require_once('gabarit.php');
}

function afficherAcceuil(){
    $contenu="";
    require_once('gabarit.php');
}
