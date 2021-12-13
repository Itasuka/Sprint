<?php
session_start();
try{
require_once('controleur/controleur.php');
	if(isset($_GET['action']) && $_GET['action']=='logout'){
		$_SESSION=array();
		session_destroy();
	}
	if(isset($_POST['log'])){
		ctlConnexion();	
	}



	else ctlAcceuil();
}
catch(Exception $e){
	$msg=$e->getMessage();
	ctlErreur($msg);
}