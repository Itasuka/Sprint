<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

<<<<<<< HEAD
//on recherche les clients ayant tel nom et telle date de naissance, retourne un tableau des id des ces clients
function chercherUnIdClient($nomclient,$datenaissanceclient){
    $connexion=getConnect();
    $requete="select idcli from client where nomcli='$nomclient' and datenaissancecli='$datenaissance'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableaudesclients=$resultat->fetchall();
    $resultat->closeCursor();
    return $tableaudesclients;
}

function syntheseClient($id){
    $connexion=getConnect();
    $requete="select *,*,*,nomemploye from client natural join contrat natural join compte natural join employe"
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableauduclient=$resultat->fetchall();
    $resultat->closeCursor();
    return $tableauduclient;
}

function creerEmploye($id,$mdp,$nom,$prenom,$categorie){
    $connexion=getConnect();
    $requete="insert into employe values ($id, '$mdp', '$nom', '$prenom', '$categorie')" ; 
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

//bien chercher l'employer à modifier avant d'utiliser cette méthode pour avoir la valeur $id
function modifierEmploye($id,$newid,$mdp){
    $connexion=getConnect();
    $requete="modify into employe values ($newid, '$mdp', '$nom', '$prenom', '$categorie') where id='$id'" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
=======
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
>>>>>>> 81f70184b9ed3273833bd25fd18673fae9697450
}

