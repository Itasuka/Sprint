<?php
require_once('modele/modele.php');
require_once('vue/vue.php');



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
		throw new Exception("Un ou les champs rentré sont erronés");
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

//------AGENT-------------
function ctlModifCli(){
		if(empty($_POST['IdCli'])){
			throw new Exception("Vous n'avez pas entré d'id client à recherché");
		}
		$id=$_POST['IdCli'];
		if(!empty($_POST['AdresseCli'])){ModifAdresseCli($id,$_POST['AdresseCli']);}
		if(!empty($_POST['NumTelCli'])){ModifNumTelCli($id,$_POST['NumTelCli']);}
		if(!empty($_POST['ProfessionCli'])){ModifProfessionCli($id,$_POST['ProfessionCli']);}
		if(!empty($_POST['SitFamiCli'])){ModifSitFamiCli($id,$_POST['SitFamiCli']);}
		$_SESSION['contenuForm']="<p><label name='reussite'>opération reussite</label></p>";
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
	if(empty($POST_["NomConseille"])){
		throw new Exception("Nom du conseillé obligatoire");
	}
	else{
		if (empty($_POST["DateDepart"])){
			$p=planningDuJour($_POST["NomConseille"]);
			afficherPlanning1jour1employe($p);
			$date=date("d-m-Y");
				for ($i=0;$i<7;$i++){
				$date=date_modify($date, '+1 day');
				$p=chercherPlanning($date,$_POST["NomConseille"]);
				afficherPlanning1jour1employe($p);
			}
		}
		else {
			$p=chercherPlanning($_POST["DateDepart"],$_POST["NomConseille"]);
			$date=$POST_["DateDepart"];
			afficherPlanning1jour1employe($p);
			for ($i=0;$i<7;$i++){
				$date=date_modify($date, '+1 day');
				$p=chercherPlanning($date,$_POST["NomConseille"]);
				afficherPlanning1jour1employe($p);	
		}
	}
}
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

function ctlafficherRechercherId(){
	afficherRechercherId();
}

function ctlChercherIdClient(){
	if((!isset($_POST['DateNaissanceClient'])) || (empty($_POST['NomClient']))){
		throw new Exception("Un ou plusieurs des champs ne sont pas remplis");
		}
	$tab=chercherUnIdClient($_POST['DateNaissanceClient'],$_POST['NomClient']);
	afficherIdClient($tab);
}

//------------FIN AGENT------------

//----------CONSEILLE--------------
function ctlPlanning1JourConseille(){
	if ((empty($_POST['JourPlanning']))||(empty($_POST['LoginC']))){
		throw new Exception("Un ou plusieurs champs sont vides");
	} 
	$p=chercherPlanning($POST_["JourPlanning"],$POST_["LoginC"]);
	afficherPlanning1jour1employe($p);
}

function ctlCreationClient(){
	if (empty($_POST['loginC'])){
		throw new Exception("le conseillé ne peut etre vide");
	}
	$loginc=$_POST['loginC'];
	$nom=$_POST['NomCli'];
	$prenom=$_POST['PrenomCli'];
	$datenaissance=$_POST['DateNaissanceCli'];
	$adresse=$_POST['AdresseCli'];
	$numtel=$_POST['NumTelCli'];
	$profession=$_POST['ProfessionCli'];
	$situationfam=$_POST['SituFamilleCli'];
	ajouterClient($loginc,$nom,$prenom,$datenaissance,$adresse,$numtel,$profession,$situationfam);
}
function ctlafficherPlanningConseille(){
	afficherPlanningConseille();
}
function ctlafficherAjoutClient(){
	afficherAjoutClient();
}
function ctlafficherVendreContrat(){
	afficherVendreContrat();
}
function ctlafficherOuvrirCompte(){
	afficherOuvrirCompte();
}
function ctlafficherModifierDecouvert(){
	afficherModifierDecouvert();
}
function ctlafficherResiliationContratCompte(){
	afficherResiliationContratCompte();
}
function ctlVendreContrat(){
	if ((empty($_POST['Idcli']))||(empty($_POST['NomContrat']))||(empty($_POST['DateOuvertureContrat']))||(empty($_POST['TarifContrat']))){
		throw new Exception("Un ou plusieurs champs sont vides");
	}
	vendreContrat($_POST['Idcli'],$_POST['NomContrat'],$_POST['DateOuvertureContrat'],$_POST['TarifContrat']);
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
	$_SESSION['contenuForm']="<p><label name='reussite'>opération reussite</label></p>";
	afficherAccesEmploye();
}

function ctlModifEmp(){
	if(empty($_POST['Login']) || empty($_POST['NouveauLoginChange']) || empty($_POST['MDP'])){
		throw new Exception("Un des champs est vide");
	}
	modifierEmploye($_POST['Login'],$_POST['NouveauLoginChange'],$_POST['MDP']);
	$_SESSION['contenuForm']="<p><label name='reussite'>opération reussite</label></p>";
	afficherAccesEmploye();
}

function ctlOuvrirCompte(){
	if ((empty($_POST['IdCli']))||(empty($_POST['NomCompte']))||(empty($_POST['DateOuvertureCompte']))||(empty($_POST['MontantDecouvert']))){
		throw new Exception("Un ou plusieurs champs sont vides");
	}
	ouvrirCompte($_POST['IdCli'],$_POST['NomCompte'],$_POST['DateOuvertureCompte'],$_POST['MontantDecouvert']);
}

function ctlChangerDecouvert(){
	if ((empty($_POST['IDCompte']))||(empty($_POST['NewDecouvert']))){
		throw new Exception("Un ou plusieurs champs sont vides");
	}
	changerdecouvert($_POST['IDCompte'],$_POST['NewDecouvert']);
}

function ctlResilierCompte(){
	if ((empty($_POST['IdResilier']))){
		throw new Exception("Le champ est vide");
	}
	supprimerCompte($_POST['IdResilier']);
}

function ctlResilierContrat(){
	if ((empty($_POST['IdResilier']))){
		throw new Exception("Le champ est vide");
	}
	supprimerContrat($_POST['IdResilier']);
	
}
//-------------FIN CONSEILLE --------------

//-----------DIRECTEUR----------------
function ctlCMSContrat(){
	$tab=LesMotifs();
	afficherChangeContrat($tab);
}
function ctlCMSPiece(){
	afficherListePiece();
}

function ctlStat(){
	afficherStat();
}
//Controle de contrat
function ctlSuprimerContrat(){
	if ((empty($_POST['IDModifContrat']))){
		throw new Exception("Le champ est vide");
	}
	supprimerMotif($_POST['IDModifContrat']);
}
function ctlModifContrat(){
	if ((empty($_POST['IDModifContrat']))){
		throw new Exception("Le champ est vide");
	}
	supprimerMontrat($_POST['IDModifContrat']);
	creeMotif($_POST['IDModifContrat']);
}
function ctlCreeContrat(){
	if ((empty($_POST['IDModifContrat']))){
		throw new Exception("Le champ est vide");
	}
	creeContrat($_POST['IDModifContrat']);
}
//Controle des pieces
function ctlCreePiece(){
	if (empty($_POST['NomPiece']) && empty($_POST['NomMotif']) ){
		ajouterPJ($_POST['NomPiece'],$_POST['NomMotif']);
	}else if(empty($_POST['NomPiece'])){
	creerPiece($_POST['NomPiece']);
	}
	throw new Exception("Les champs sont vide");
}
function ctlModifPiece(){
	if (empty($_POST['NomPiece']) && empty($_POST['NomMotif'])){
		modifierListePJ($_POST['NomPiece'],$_POST['NomListe']);;
	}
	throw new Exception("Le champ est vide");
}
function ctlSuppPiece(){
	if (empty($_POST['NomPiece']) && empty($_POST['NomMotif'])){
		supprimerPJ($_POST['NomPiece'],$_POST['NomMotif']);;
	}
	throw new Exception("Le champ est vide");

}
//controle de Statistique
function ctlaffStat1(){
	afficherStratDateContrat();
}
function ctlaffStat2(){
	afficherStratDateRDV();
}
function ctlaffStat3(){
	afficherStratDateClients();
}
function ctlaffStat4(){
	afficherStratDateSomme();
}
function ctlStat1(){
	$res=statsContrats($_POST['IDDate1Contrat'],$_POST['IDDate2Contrat']);
	afficherStatsContrats($res);
}
function ctlStat2(){
	$res=statsRDV($_POST['IDDate1RDV'],$_POST['IDDate1RDV']);
	afficherStatsRDV($res);
}
function ctlStat3(){
	$res=statsClient($_POST['IDDateClient']);
	afficherStatsClients($res);
}
function ctlStat4(){
	$res=statsSolde($_POST['IDDate1Somme']);
	afficherStatsSomme($res);
}
//----------FIN DIRECTEUR-----------
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
	
