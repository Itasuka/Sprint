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
function
