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
	}



	else{ctlAcceuil();}
}
catch(Exception $e){
	$msg=$e->getMessage();
	ctlErreur($msg);
}