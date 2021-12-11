<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

function getCategorie($login){
	$connexion=getConnect();
	$requete="select categorie from employe where login="$login"";
	$categorie=$connexion->query($requete);
	$categorie->closeCursor();
	return $categorie;
}

function ajouterClient($nom,$prenom,$datenaissance,$addresse,$numtel,$profession,$situationfam){
	$connexion=getConnect();
	$requete="insert into client values(0,$nom,$prenom,$datenaissance,$addresse,$numtel,$profession,$situationfam)";
	$insere=$connexion->query($requete);
	$insere->closeCursor();
}

function vendreContrat($idcli,$nom,$date,$tarifmensuel){
	$connexion=getConnect();
	$requete="insert into contrat values(0,$idcli,$nom,$date,$tarifmensuel)";
	$vendre=$connexion->query($requete);
	$vendre->closeCursor();
}

function ouvrircompte($idcli,$nomcompte,$date,$montantdecouvert){
	$connexion=getConnect();
	$requete="insert into compte values(0,$idcli,$nomcompte,$date,$montantdecouvert)";
	$ouvrir=$connexion->query($requete);
	$ouvrir->closeCursor();
}

function changerdecouvert($idcompte,$decouvert){
	$connexion=getConnect();
	$requete="update compte set montantdecouvert = $decouvert where idcompte=$idcompte";
	$miseajour=$connexion->query($requete);
	$miseajour->closeCursor();
}

function supprime($type,$id){
	$connexion=getConnect();
	if ($type=="contrat"){
		$requete="delete from contrat where idcontrat=$id";
		$supprime=$connexion->query($requete);
	}
	if ($type=="compte"){
		$requete"delete from compte where idcompte=$id";
		$supprime=$connexion->query($requete);
	}
	$supprime->closeCursor();
}

