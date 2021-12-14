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
		}
		else if($_SESSION['categorie']=="Agent"){
			//Tout les isset Agents
			if(isset($_POST['ModifInfoCli'])){
				ctlAfficherModInfCli();
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

