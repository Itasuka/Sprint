<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

function chercherUnIdClient($nomclient,$datenaissanceclient){
    $connexion=getConnect();
    $requete="select idcli from client where nomcli=$nomclient and datenaissancecli=$datenaissance";
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

function creerEmploye($login,$mdp,$nom,$prenom,$categorie){
    $connexion=getConnect();
    $requete="insert into employe values ($login, $mdp, $nom, $prenom, $categorie)" ; 
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

//bien chercher l'employer à modifier avant d'utiliser cette méthode pour avoir la valeur $id
function modifierEmploye($login,$newlogin,$mdp){
    $connexion=getConnect();
    $requete="update employe set login=$newlogin, mdp=$mdp where login=$login" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function supprimerMotif($nomMotif){
    $connexion=getConnect();
    $requete="delete into motif where nommotif=$nomMotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function modifierMotif($nomMotif,$newNomMotif){
    $connexion=getConnect();
    $requete="update motif set nommotif=$newNomMotif where nommotif=$nomMotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function creerMotif($nomMotif){
    $connexion=getConnect();
    $requete="insert into motif(nommotif) values $nomMotif";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function creerListePourMotif($nomMotif,$liste){
    $connexion=getConnect();
    $requete="insert into motif(liste) values $liste where nommotif=$nomMotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function modifierListePourMotif($nomMotif,$liste){
    $connexion=getConnect();
    $requete="update motif set liste=$liste where nommotif=$nomMotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function supprimerListePourMotif($nomMotif){
    $connexion=getConnect();
    $requete="update motif set liste=NULL where nommotif=$nomMotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function bloquerCréneau($date,$heure,$login){
    $connexion=getConnect();
    $requete="insert into planning(dateevenement,login,heure) values ($date,$login,$heure)" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function poserRDV($date,$heure,$login,$idcli,$nommotif){
    $connexion=getConnect();
    $requete="insert into planning values ($date,$login,$idcli,$nommotif,$heure)" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
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

function supprimeConCom($type,$id){
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

