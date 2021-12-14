<?php
session_start();
require_once('controleur/controleur.php');
try{
	if(isset($_SESSION['contenuBackup'])){
		$_SESSION['contenu']=$_SESSION['contenuBackup'];
    	$_SESSION['contenuBackup']="";
	}
	if(!isset($_SESSION['contenu'])){
		$_SESSION['contenu']="";
	}
	if(!isset($_SESSION['contenuForm']) || isset($_SESSION['contenuForm'])){
		$_SESSION['contenuForm']="";
	}
	if ((isset($_GET['action'])) && ($_GET['action'] == 'logout')){
		$_SESSION=array();
		session_destroy();
		$_SESSION['contenu']="";
		$_SESSION['contenuForm']="";
	}
	if(isset($_POST['log'])){
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];
		ctlConnexion($login,$mdp);
	}
	if(isset($_SESSION['categorie'])){
		if($_SESSION['categorie']=="Conseille"){
			//Tout les isset conseille
			if(isset($_POST['planning_conseiller'])){
				ctlafficherPlanningConseille();
			}
			else if(isset($_POST['ajoutCli'])){
				ctlafficherAjoutClient();
			}
			else if(isset($_POST['vendreContrat'])){
				ctlafficherVendreContrat();
			}
			else if(isset($_POST['ouvrirCompte'])){
				ctlafficherOuvrirCompte();
			}
			else if(isset($_POST['modifDecouvert'])){
				ctlafficherModifierDecouvert();
			}
			else if(isset($_POST['resilier'])){
				ctlafficherResiliationContratCompte();
			}
			else if(isset($_POST['creneau_conseiller'])){
				ctlafficherPoserTaches();
			}

			//----------------------------------
			//Isset pour Planning
			if(isset($_POST['planning1jour'])){
				ctlPlanning1JourConseille();
			}
			//----------------------------------
			//Isset Ajout Client
			if(isset($_POST['envoyerNewCli'])){
				ctlCreationClient();
			}
			//----------------------------------
			//Isset Vendre Contrat
			if(isset($_POST['ContratVendu'])){
				ctlVendreContrat();
			}
			//------------------------------------
			//Isset Ouvrir compte
			if(isset($_POST['CompteOuvert'])){
				ctlOuvrirCompte();
			}
			//------------------------------------
			//Isset Modifier decouvert
			if(isset($_POST['changerDecouvert'])){
				ctlChangerDecouvert();
			}
			//------------------------------------
			//Isset Resiliation Contrat ou Compte
			if(isset($_POST['ResilierContrat'])){
				ctlResilierContrat();
			}

			if(isset($_POST['ResilierCompte'])){
				ctlResilierCompte();
			}
			//------------------------------------
			//Isset Bloquer Un creneau
			if(isset($_POST['putcreneau'])){
				ctlPoserCreneau();
			}
		}
		else if($_SESSION['categorie']=="Agent"){
			//Tout les isset Agents
			if(isset($_POST['ModifInfoCli'])){
				ctlAfficherModInfCli();
			}
			else if(isset($_POST['ChercherId'])){
				ctlafficherRechercherId();
			}
			else if(isset($_POST['InfoCli'])){
				ctlInfCli();
			}
			else if(isset($_POST['DouRCompteCli'])){
				ctlDouRCompteCli();
			}
			else if(isset($_POST['PrendreRDV'])){
				ctlPrendreRDV();
			}
			//----------------------------------
			//Isset pour Modification Client :   
			if(isset($_POST['ModifierCli'])){
				ctlModifCli();
			}
			//----------------------------------
			//Isset pour Synthèse Client : 
			if(isset($_POST['SyntheseClient'])){
				ctlAfficherSyntheseClient();
			}
			//----------------------------------
			//Isset pour RechercheCli (plus action)
			if(isset($_POST['RechercherComptes'])){
				ctlRechercheCli();
			}
			//----------------------------------
			//Isset pour la prise de RDV :
			if(isset($_POST['VoirPlanning7j'])){
				ctlPlanning7j(); // A FAIRE
			}
			if(isset($_POST['CreationRDV'])){
				ctlAjoutRDV();
			}
			//-------------------------------
			//Isset pour chercher id
			if(isset($_POST['chercherUnClient'])){
				ctlChercherIdClient();
			}
			//---------------------------------
			//Isset D ou R
			if(isset($POST['operation'])){
				ctlDebiterCrediter();
			}
			

		}
		else if($_SESSION['categorie']=="Directeur"){
			//Tout les isset Directeur
			if(isset($_POST['ModifLogEmploye'])){
				ctlModifierLogEmploye();
			}
			else if(isset($_POST['C/M/S_Contrat'])){
				ctlCMSContrat();
			}
			else if(isset($_POST['C/M/S_Piece'])){
				ctlCMSPiece();
			}
			else if(isset($_POST['Stat'])){
				ctlStat();
			}
			//--------------------------------------
			//Isset pour Acces employe :  
			if(isset($_POST['CreerEmploye'])){
				ctlCreeEmploye();
			}
			if(isset($_POST['modifier_acces'])){
				ctlModifEmp();
			}
			//Isset pour modification de contrat
			if(isset($_POST['ContratCree'])){
				ctlCreeContrat();
			}
			if(isset($_POST['ContratModif'])){
				ctlModifContrat();
			}
			if(isset($_POST['ContratSupp'])){
				ctlCreeContrat();
			}
			//isset pour modification de Piece
			if(isset($_POST['PieceCree'])){
				ctlCreePiece();
			}
			if(isset($_POST['PieceSupp'])){
				ctlSuppPiece();
			}
			if(isset($_POST['PieceModif'])){
				ctlModifPiece();
			}
			//isset pour afficher les statistiques
			if(isset($_POST['StatContrat'])){
				ctlaffStat1();
			}
			if(isset($_POST['StatRDV'])){
				ctlaffStat2();
			}
			if(isset($_POST['StatCli'])){
				ctlaffStat3();
			}
			if(isset($_POST['StatSomme'])){
				ctlaffStat4();
			}
			if(isset($_POST['OkayContratStat'])){
				ctlStat1();
			}
			if(isset($_POST['OkayRDVStat'])){
				ctlStat2();
			}
			if(isset($_POST['OkayClientStat'])){
				ctlStat3();
			}
			if(isset($_POST['OkaySommeStat'])){
				ctlStat4();
			}
		}

		ctlAccueilCat();
	}



	else{ctlAcceuil();}
}
catch(Exception $e){
	$msg=$e->getMessage();
	ctlErreur($msg);
}





//Les problème rencontré:

//Le CSS sur tout les résultat de requètes

//Pour synthese client comment faire pour faire une erreur si l'id ne correspond pas à un client ?

// LesComptes marche pas entièrement ????

