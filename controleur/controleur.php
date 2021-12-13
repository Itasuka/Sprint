<?php
	
require_once('modele/modele.php');
require_once('vue/vue.php');


function ctlErreur($erreur){
	afficherErreur($erreur);
}

function ctlAcceuil(){
	afficherAcceuil();
}

    //debiter ou crediter le compte
    //mettre synthese compte dans variable
    //appelle de la fonctopn afficher comptes aves checkbox
    //on verif quelle checkbox et quelle boutons sont cochés
    //ensuite on appelle soit debiter soit crediter