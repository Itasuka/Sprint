<?php
require_once('modele/modele.php');
require_once('vue/vue.php');

function ctlConnexion($login,$mdp){
	$categorie=seConnecter($login,$mdp);
	foreach ($categorie as $ligne){
		$cat=$ligne->CATEGORIE;
	}
	if($categorie!=null){
		$_SESSION['categorie']=$cat;
		ctlAcceuilCat();
	}
	else{
		throw new Exception("Un ou les champs rentré sont erroné");
	}
}

function ctlAcceuilCat(){
	$categorie=$_SESSION['categorie'];
	if($categorie=="Conseille"){
		afficherAcceuilConseille();
	}
	if($categorie=="Agent"){
		afficherAcceuilAgent();
	}
	if($categorie=="Directeur"){
		afficherAcceuilDirecteur();
	}
}

function ctlErreur($erreur){
	if(isset($_SESSION['categorie'])){
		afficherErreurco($erreur);
	}
	afficherErreurdeco($erreur);
}

function ctlAcceuil(){
	afficherAcceuil();
}

function ctl
    //debiter ou crediter le compte
    //mettre synthese compte dans variable
    //appelle de la fonctopn afficher comptes aves checkbox
    //on verif quelle checkbox et quelle boutons sont cochés
    //ensuite on appelle soit debiter soit crediter
	afficherIndex();
}
