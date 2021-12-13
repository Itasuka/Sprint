<?php
session_start();
require_once('controleur/controleur.php');
try{
	if ((isset($_GET['action'])) && ($_GET['action'] == 'logout')){
		$_SESSION=array();
		session_destroy();
	}
	if(isset($_POST['login'])){
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		ctlConnexion($login,$mdp);
	}
	if(isset($_SESSION['categorie'])){
		ctlAcceuilCat();
		if($_SESSION['categorie']=="Conseille"){
			//Tout les isset conseille
		}
		else if($_SESSION['categorie']=="Agent"){
			//Tout les isset Agents
		}
		else if($_SESSION['categorie']=="Directeur"){
			//Tout les isset Directeur
			if(isset($_POST['ModifLogEmploye'])){
				ctlModifierLogEmploye();
			}
			if(isset($_POST['C/M/S_Contrat'])){
				ctlCMSContrat();
			}
			if(isset($_POST['C/M/S_Piece'])){
				ctlCMSPiece();
			}
			if(isset($_POST['Stat'])){
				ctlStat();
			}
		}
	}



	else{ctlAcceuil();}
}
catch(Exception $e){
	$msg=$e->getMessage();
	ctlErreur($msg);
}