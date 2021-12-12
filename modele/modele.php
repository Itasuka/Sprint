<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

function debitercompte($idcompte,$montant){
    $connexion=getConnect();
    $requete="select $solde from compte where idcompte=$idcompte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableau=$resultat->fetchall();
    $resultat->closeCursor();
    foreach($tableau as $lignes){
        $s=$lignes->solde;
        $nvsolde=$s-$montant;
        $requete2="update compte set solde=$nvsolde where idcompte=$idcomtpe";
        $resultat2=$connexion->query($requete2);
        $resultat2->closeCursor();
    }
}

function creditercompte($idcompte,$montant){
    $connexion=getConnect();
    $requete="select $solde from compte where idcompte=$idcompte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableau=$resultat->fetchall();
    $resultat->closeCursor();
    foreach($tableau as $lignes){
        $s=$lignes->solde;
        $nvsolde=$s+$montant;
        $requete2="update compte set solde=$nvsolde where idcompte=$idcomtpe";
        $resultat2=$connexion->query($requete2);
        $resultat2->closeCursor();
    }
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

//ICI LES TROIS FONCTIONS A FAIRE POUR LE CTLSYNTHESECLIENT (on obtient diff tab a mettre en parametres de affichersynthese)
function syntheseClientInfo($id){
    $connexion=getConnect();
    $requeteinfoclient="select * from client where idcli=$id";
    $infoclient=$connexion->query($requeteinfoclient);
    $infoclient->setFetchMode(PDO::FETCH_OBJ);
    $tabduclient=$infoclient->fetchall();
    $infoclient->closeCursor();
    return $tabduclient;

function syntheseClientContrat($id){
    $requeteinfocontrat="select nomcontrat from client where idcli=$id";
    $infocontrat=$connexion->query($requeteinfocontrat);
    $infocontrat->setFetchMode(PDO::FETCH_OBJ);
    $tabcompte=$infocompte->fetchall();
    $infocontrat->closeCursor();
    return $tabcompte;
}

function syntheseClientCompte($id){
    $requeteinfocompte="select nomcompte,solde from client where idcli=$id";
    $infocompte=$connexion->query($requeteinfocompte);
    $infocompte->setFetchMode(PDO::FETCH_OBJ);
    $tabdcontrat=$infocompte->fetchall();
    $infocompte->closeCursor();
    return $tabcontrat;
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
    $trouveridmotif="select idmotif from motif where nommotif=$nomMotif";
    $idmotif=$connexion->query($trouveridmotif);
    $idmotif->setFetchMode(PDO::FETCH_OBJ);
    $idmotif->closeCursor();
    while ( $lignemotif = $idmotif->fetch() ) {
    $requete="delete from motif where idmotif=$idmotif" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
    }
}

function creerMotif($nomMotif){
    $connexion=getConnect();
    $requete="insert into motif values (0,$nomMotif)";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function creerPiece($lapiece){
    $connexion=getConnect();
    $requete="insert into piece values (0,$lapiece)" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function ajouterPJ($nomMotif,$nomPiece){
    $connexion=getConnect();
    $trouveridmotif="select idmotif from motif where nommotif=$nomMotif";
    $idmotif=$connexion->query($trouveridmotif);
    $idmotif->setFetchMode(PDO::FETCH_OBJ);
    $idmotif->closeCursor();
    $trouveridpiece="select idpiece from piece where nompiece=$nomPiece";
    $idpiece=$connexion->query($trouveridpiece);
    $idpiece->setFetchMode(PDO::FETCH_OBJ);
    $idpiece->closeCursor();
    while( $lignemotif = $idmotif->fetch() ) {
        while( $lignepiece = $idmotif->fetch() ) {
             $requete="insert into requis values ($lignepiece->$idpiece,$lignemotif->$idmotif)";
        }
    }
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function supprimerPJ($nomMotif,$nomPiece){
    $connexion=getConnect();
    $trouveridmotif="select idmotif from motif where nommotif=$nomMotif";
    $idmotif=$connexion->query($trouveridmotif);
    $idmotif->closeCursor();
    $idmotif->setFetchMode(PDO::FETCH_OBJ);
    $trouveridpiece="select idpiece from piece where nompiece=$nomPiece";
    $idpiece=$connexion->query($trouveridpiece);
    $idpiece->closeCursor();
    $idpiece->setFetchMode(PDO::FETCH_OBJ);
    while( $lignemotif = $idmotif->fetch() ) {
        while( $lignepiece = $idmotif->fetch() ) {
             $requete="delete from requis where idmotif=$idmotif and idpiece=$idpiece";
        }
    }
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function modifierListePJ($nomMotif,$liste){
    $connexion=getConnect();
    $requete="update motif set liste=$liste where nommotif=$nomMotif" ;
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
	$categorie->setFetchMode(PDO::FETCH_OBJ);
	$categorie->fetchall();
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

function ouvrirCompte($idcli,$nomcompte,$date,$montantdecouvert){
	$connexion=getConnect();
	$requete="insert into compte values(0,$idcli,$nomcompte,$date,$montantdecouvert)";
	$ouvrir=$connexion->query($requete);
	$ouvrir->closeCursor();
}

function checkCompte($idcli,$nomcompte){
    $connexion=getConnect(); 
    $requete="select idcli from compte where idcli=$idcli and nomcompte=$nomcompte";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tab=$resultat->fetchall();
    $resultat->closeCursor();
    return $tab;
}

function checkContrat($idcli,$nomcontrat){
    $connexion=getConnect(); 
    $requete="select idcli from compte where idcli=$idcli and nomcontrat=$nomcontrat";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tab=$resultat->fetchall();
    $resultat->closeCursor();
    return $tab;
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


function chercherPlanning($jour,$employe){
	$connexion=getConnect();
	$requete="select dateevenement,idmotif,login,idcli,heure,group_concat(nompiece),nommotif from planning where dateevenement=$jour and login=$employe natural join motif natural join requis natural join piece";
	$planning=$connexion->query($requete);
	$planning->setFetchMode(PDO::FETCH_OBJ);
	$planning->fetchall();
	$planning->closeCursor();
	$requete="select distinct idcli from planning where dateevenement=$jour and login=$employe";
	$lescli=$connexion->query($requete);
	$lescli->setFetchMode(PDO::FETCH_OBJ);
	$lescli->fetchall();
	$tabres=array($planning);
	$tabclis=array();
	foreach ($lescli as $client){
		$tabcli=syntheseClientInfo($client);
		$tabcontrat=syntheseClientContrat($client);
		$tabcompte=syntheseClientCompte($client);
		array_push($tabclis, array($client,$tabcli,$tabcontrat,$tabcompte));
	}
	array_push($tabres,$tabclis);
	return afficherPlanning($planning);
}

function planningDuJour($conseille){
	$ajd=localtime();
	return chercherPlanning($ajd,$conseille);
}

function statsContrats($date1,$date2){
	$connexion=getConnect();
	$requete="select count(idcontrat) nb from contrat where dateouverture>=$date1 and dateouverture<=date2";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$resultat->fetchall();
	$resultat->closeCursor();
	return $resultat;
}

function statsRDV($date1,$date2){
	$connexion=getConnect();
	$requete="select count(dateevenement) nb from planning where dateevenement>=$date1 and dateevenement<=$date2";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$resultat->fetchall();
	$resultat->closeCursor();
	return $resultat;
}

function statsClient($date){
	$connexion=getConnect();
	$requete="select count(idcli) nb from client where idcli in (
			    select idcli from contrat where dateouverture<=$date
			    union
			    select idcli from compte where dateouverture<=$date";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$resultat->fetchall();
	$resultat->closeCursor();
	return $resultat;
}

function statsSolde($date){
	$connexion=getConnect();
	$requete="select sum(solde) somme from compte where dateouverture<=$date";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$resultat->fetchall();
	$resultat->closeCursor();
	return $resultat;
}

