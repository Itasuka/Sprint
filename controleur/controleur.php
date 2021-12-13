<?php
session_start();
if (!isset($_SESSION['login'])){
	header("location: site.php");
	exit();
}
require_once('modele/modele.php') ;
require_once('vue/vue.php') ;
function CTLAccueil(){
	
require_once('modele/modele.php');
require_once('vue/vue.php');


function ctlErreur($erreur){
	afficherErreur($erreur);
}

function ctlAcceuil(){
	afficherAcceuil();
}