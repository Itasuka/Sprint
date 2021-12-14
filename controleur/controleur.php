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

/*function ctlAjoutRDV(){
	if((!isset($_POST['DateRDV']) || empty($_POST['HeureRDV']) || empty($_POST['LoginConseille']) || empty($_POST['IdCli'])){
		throw new Exception("Un ou plusieurs des champs ne sont pas remplis");
}poserRDV($_POST['DateRDV'],$_POST['HeureRDV'],$_POST['LoginConseille'],$_POST['IdCli'],$_POST['MotifRDV']);*
//finir 
}*/

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
	if ((empty($_POST['Idcli']))||(empty($_POST['LoginC']))){
		throw new Exception("L'identifiant et le conseillé ne peuvent etre vide");
	}
	$idclient=$_POST['Idcli'];
	$loginc=$_POST['LoginC'];
	$nom=$_POST['NomCli'];
	$prenom=$_POST['PrenomCli'];
	$datenaissance=$_POST['DateNaissanceCli'];
	$adresse=$_POST['AdresseCli'];
	$numtel=$_POST['NumTelCli'];
	$profession=$_POST['ProfessionCli'];
	$situationfam=$_POST['SituFamilleCli'];
	ajouterClient($idclient,$loginc,$nom,$prenom,$datenaissance,$adresse,$numtel,$profession,$situationfam);
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
	
