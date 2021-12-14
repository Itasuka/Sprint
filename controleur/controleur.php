<?php
require_once('modele/modele.php');
require_once('vue/vue.php');

//date_modify($date, '+1 day');

function ctlConnexion($login,$mdp){
	$categorie=seConnecter($login,$mdp);
	foreach ($categorie as $ligne){
		$cat=$ligne->categorie;
	}
	if($categorie!=null){
		$_SESSION['categorie']=$cat;
		ctlAccueilCat();
	}
	else{
		throw new Exception("Un ou les champs rentré sont erroné");
	}
}

function ctlAccueilCat(){
	$categorie=$_SESSION['categorie'];
	if($categorie=="Conseille"){
		afficherAccueilConseille();
	}
	if($categorie=="Agent"){
		afficherAccueilAgent();
	}
	if($categorie=="Directeur"){
		afficherAccueilDirecteur();
	}
}

function ctlAfficherModInfCli(){
	afficherModifierInfosClientAgent();
}
function ctlModifCli(){
		if(empty($_POST['IdCli'])){
			throw new Exception("Vous n'avez pas entré d'id client à recherché");
		}
		$id=$_POST['IdCli'];
		if(!empty($_POST['AdresseCli'])){ModifAdresseCli($id,$_POST['AdresseCli']);}
		if(!empty($_POST['NumTelCli'])){ModifNumTelCli($id,$_POST['NumTelCli']);}
		if(!empty($_POST['MailCli'])){ModifMailCli($id,$_POST['MailCli']);}
		if(!empty($_POST['ProfessionCli'])){ModifProfessionCli($id,$_POST['ProfessionCli']);}
		if(!empty($_POST['SitFamiCli'])){ModifSitFamiCli($id,$_POST['SitFamiCli']);}
		$_SESSION['contenuForm']="<p>Les modifications ont été effectuée</p>";
		afficherModifierInfosClientAgent();
}


function ctlInfCli(){
	afficherSyntheseClientAgent();
}
function ctlAfficherSyntheseClient(){
	if(empty($_POST['IdCli'])){
		throw new Exception("Veuillez rentrer un id de client");
	}
	$tabclient=syntheseClientInfo($_POST['IdCli']);
	$tabcontrat=syntheseClientContrat($_POST['IdCli']);
	$tabcompte=syntheseClientCompte($_POST['IdCli']);
	afficherSynthese($tabclient,$tabcontrat,$tabcompte);
	afficherSyntheseClientAgent();
}

function ctlDouRCompteCli(){
	afficherDouRCompteClient();
}

function ctlRechercheCli(){
	if(empty($_POST['IdCli'])){
		throw new Exception("Veuillez rentrer un id de client");
	}
	$tab=syntheseClientCompte($_POST['IdCli']);
	afficherLesComptes($tab);
}


function ctlPrendreRDV(){
	$tab=lesMotifs();
	afficherPrendreRDV($tab);
}

function ctlPlanning7j(){

}

function ctlAjoutRDV(){
	if(!isset($_POST['DateRDV']) || empty($_POST['HeureRDV']) || empty($_POST['LoginConseille']) || empty($_POST['IdCli'])){
	throw new Exception("Un ou plusieurs des champs ne sont pas remplis");
}
$date=$_POST['DateRDV'];
$heure=$_POST['HeureRDV'];
$login=$_POST['LoginConseille'];
$idcli=$_POST['IdCli'];
$motif=$_POST['MotifRDV'];
	poserRDV($date,$heure,$login,$idcli,$motif,'rdv');
	$tabp=listePiece($motif);
	$_SESSION['contenuForm']="Liste des pièces nécessaire au rendez-vous :  ";
	foreach ($tabp as $ligne) {
		$_SESSION['contenuForm'].=$ligne->nompiece.", ";
	}
	$tab=lesMotifs();
	afficherPrendreRDV($tab);
}

function ctlModifierLogEmploye(){
	afficherAccesEmploye();
}

function ctlCreeEmploye(){
	$log=$_POST['LoginChange'];
	$mdp=$_POST['MDPChange'];
	$nom=$_POST['NomAChange'];
	$prenom=$_POST['PrenomAChanger'];
	$cate=$_POST['CatChange'];
	if(empty($_POST['NomAChange']) || empty($_POST['PrenomAChanger']) || empty($_POST['LoginChange']) || empty($_POST['MDPChange']) || empty($_POST['CatChange'])){
		throw new Exception("Un des champs est vide");
	}
	creerEmploye($log,$mdp,$nom,$prenom,$cate);
	$_SESSION['contenuForm']="<p>L'employe a été créé</p>";
	afficherAccesEmploye();
}

function ctlModifEmp(){
	if(empty($_POST['Login']) || empty($_POST['NouveauLoginChange']) || empty($_POST['MDP'])){
		throw new Exception("Un des champs est vide");
	}
	modifierEmploye($_POST['Login'],$_POST['NouveauLoginChange'],$_POST['MDP']);
	$_SESSION['contenuForm']="<p>L'employe a été modifié</p>";
	afficherAccesEmploye();
}

function ctlErreur($erreur){
	if(isset($_SESSION['categorie'])){
		afficherErreurco($erreur);
		ctlAccueilCat();
	}
	else{afficherErreurdeco($erreur);}
}

function ctlAcceuil(){
	afficherIndex();
}

    //debiter ou crediter le compte
    //mettre synthese compte dans variable
    //appelle de la fonctopn afficher comptes aves checkbox
    //on verif quelle checkbox et quelle boutons sont cochés
    //ensuite on appelle soit debiter soit crediter
	
