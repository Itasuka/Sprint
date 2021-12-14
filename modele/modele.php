<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

function seConnecter($login,$mdp){
	$connexion=getConnect();
	$requete="select categorie from employe where LOGIN='".$login."' and MDP='".$mdp."'";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$categorie=$resultat->fetchall();
	$resultat->closeCursor();
	return $categorie;
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
    $requete="select solde from compte where idcompte=$idcompte";
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

function checkRDV($daterdv,$heurerdv,$login){
    $connexion=getConnect();
    $requete="select * from planning where dateevenement='$daterdv' and heure='$heurerdv' and login='$login'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableaudesclients=$resultat->fetchall();
    $resultat->closeCursor();
    return $tableaudesclients;
}

function chercherUnIdClient($nomclient,$datenaissanceclient){
    $connexion=getConnect();
    $datenaissanceclient2=date("Y-m-d");
    $requete="select idcli from client where nomcli='$nomclient' and datenaissance=$datenaissanceclient2";
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
}

function syntheseClientContrat($id){
    $connexion=getConnect();
    $requeteinfocontrat="select nomcontrat,tarifmensuel from contrat where idcli=$id";
    $infocontrat=$connexion->query($requeteinfocontrat);
    $infocontrat->setFetchMode(PDO::FETCH_OBJ);
    $tabcontrat=$infocontrat->fetchall();
    $infocontrat->closeCursor();
    return $tabcontrat;
}

function syntheseClientCompte($id){
    $connexion=getConnect();
    $requeteinfocompte="select * from compte where idcli=$id";
    $infocompte=$connexion->query($requeteinfocompte);
    $infocompte->setFetchMode(PDO::FETCH_OBJ);
    $tabcompte=$infocompte->fetchall();
    $infocompte->closeCursor();
    return $tabcompte;
}

function creerEmploye($login,$mdp,$nom,$prenom,$categorie){
    $connexion=getConnect();
    $requete="insert into employe values ('$login','$mdp','$nom','$prenom','$categorie')" ;
    echo $requete; 
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

//bien chercher l'employer à modifier avant d'utiliser cette méthode pour avoir la valeur $id
function modifierEmploye($login,$newlogin,$mdp){
    $connexion=getConnect();
    $requete="update employe set login='$newlogin', mdp='$mdp' where login='$login'" ;
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
    $requete="insert into planning(idevenement,dateevenement,login,heure,categorie) values (0,'$date','$login','$heure','tache')" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

function poserRDV($date,$heure,$login,$idcli,$nommotif,$categorie){
    $connexion=getConnect();
    $requete="insert into planning values(0,'$date','$login','$idcli','$nommotif','$heure','$categorie')" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
    
function getCategorie($login){
	$connexion=getConnect();
	$requete="select categorie from employe where login=$login";
	$categorie=$connexion->query($requete);
	$categorie->setFetchMode(PDO::FETCH_OBJ);
	$categorie->fetchall();
	$categorie->closeCursor();
	return $categorie;
}

function ajouterClient($loginconseille,$nom,$prenom,$datenaissance,$adresse,$numtel,$profession,$situationfam){
	$connexion=getConnect();
	$requete="insert into client values(0,'$loginconseille','$nom','$prenom','$datenaissance','$adresse','$numtel','$profession','$situationfam')";
	$insere=$connexion->query($requete);
	$insere->closeCursor();
}

    
function vendreContrat($idcli,$nom,$date,$tarifmensuel){
	$connexion=getConnect();
	$requete="insert into contrat values(0,'$idcli','$nom','$date','$tarifmensuel')";
	$vendre=$connexion->query($requete);
	$vendre->closeCursor();
}

function ouvrirCompte($idcli,$nomcompte,$date,$montantdecouvert){
	$connexion=getConnect();
	$requete="insert into compte values(0,'$idcli','$nomcompte','$date','$montantdecouvert',0)";
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

function supprimerContrat($id){
	$connexion=getConnect();
	$requete="delete from contrat where idclient=$id";
	$supprime=$connexion->query($requete);
    $supprime->closeCursor();
}
	
function supprimerCompte($id){
    $connexion=getConnect();
    $requete="delete from compte where idclient=$id";
	$supprime=$connexion->query($requete);
    $supprime->closeCursor();
}


function chercherPlanning($jour,$employe){
	$connexion=getConnect();
	$requete="select dateevenement,idmotif,login,idcli,heure,group_concat(nompiece),nommotif from planning where dateevenement=$jour and login=$employe natural join motif natural join requis natural join piece";
	$planning=$connexion->query($requete);
	$planning->setFetchMode(PDO::FETCH_OBJ);
	$tab1=$planning->fetchall();
	$planning->closeCursor();
	$requete="select distinct idcli from planning where dateevenement=$jour and login=$employe";
	$lescli=$connexion->query($requete);
	$lescli->setFetchMode(PDO::FETCH_OBJ);
	$lescli->fetchall();
	$tabres=array($tab1);
	$tabclis=array();
	foreach ($lescli as $client){
		$tabcli=syntheseClientInfo($client);
		$tabcontrat=syntheseClientContrat($client);
		$tabcompte=syntheseClientCompte($client);
		array_push($tabclis, array($client,$tabcli,$tabcontrat,$tabcompte));
	}
	array_push($tabres,$tabclis);
	return afficherPlanning($tabres);
}

function planningDuJour($conseille){
	$ajd=date("d-m-Y");
	return chercherPlanning($ajd,$conseille);
}

function statsContrats($date1,$date2){
	$connexion=getConnect();
	$requete="select count(idcontrat) nb from contrat where dateouverture>=$date1 and dateouverture<=date2";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$tab=$resultat->fetchall();
	$resultat->closeCursor();
	return $tab;
}

function statsRDV($date1,$date2){
	$connexion=getConnect();
	$requete="select count(dateevenement) nb from planning where dateevenement>=$date1 and dateevenement<=$date2";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$tab=$resultat->fetchall();
	$resultat->closeCursor();
	return $tab;
}

function statsClient($date){
	$connexion=getConnect();
	$requete="select count(idcli) nb from client where idcli in (
			    select idcli from contrat where dateouverture<=$date
			    union
			    select idcli from compte where dateouverture<=$date";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$tab=$resultat->fetchall();
	$resultat->closeCursor();
	return $tab;
}

function statsSolde($date){
	$connexion=getConnect();
	$requete="select sum(solde) somme from compte where dateouverture<=$date";
	$resultat=$connexion->query($requete);
	$resultat->setFetchMode(PDO::FETCH_OBJ);
	$tab=$resultat->fetchall();
	$resultat->closeCursor();
	return $tab;
}

function listePiece($nomMotif){
    $connexion=getConnect();
    $requete="select nompiece from motif natural join requis natural join piece where nommotif='$nomMotif'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tab=$resultat->fetchall();
    $resultat->closeCursor();
    return $tab;
}

function lesMotifs(){
    $connexion=getConnect();
    $requete="select * from motif";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tab=$resultat->fetchall();
    $resultat->closeCursor();
    return $tab;
}

function ModifAdresseCli($idCli1,$adressecli){
    $connexion=getConnect();
    $requete="update client set adressecli=$adressecli where idCli=$idCli1";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function ModifNumTelCli($idCli1,$NumTelcli){
    $connexion=getConnect();
    $requete="update client set numtelcli=$NumTelcli where idCli=$idCli1";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function ModifMailCli($idCli1,$mailcli){
    $connexion=getConnect();
    $requete="update client set mailcli=$mailcli where idCli=$idCli1";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function ModifProfesionCli($idCli1,$Profesioncli){
    $connexion=getConnect();
    $requete="update client set profesioncli1=$Profesioncli where idCli=$idCli1";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}
function ModifSitFamiCli($idCli1,$Sitfamicli){
    $connexion=getConnect();
    $requete="update client set situationfamcli=$Sitfamicli where idCli=$idCli1";
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}