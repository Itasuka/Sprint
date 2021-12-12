<?php
require_once('modele/modele.php');
require_once('vue/vue.php');


function ctlErreur($erreur){
	afficherErreur($erreur);
}

function ctlAcceuil(){
	afficherAcceuil();
}