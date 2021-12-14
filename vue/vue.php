<?php

function afficherIndex(){
    $contenuCat='<body>
            <form method="POST" action="site.php">
                <fieldset>
                    <legend> Veillez saisir votre login et votre mot de passe </legend>
                    <p>
                        <label for="log">Votre login:</label>
                        <input type="text" name="login" id="login" placeholder="saisir votre login" required  />
                    </p>
                    <p>
                        <label for="mdp">Votre mot de passe :</label>
                        <input type="password" name="mdp" id="mdp" placeholder="saisir votre mot de passe" required />
                    </p>
                    <p>
                        <input type="submit" name="log" value="envoyer">
                    </p>
                </fieldset>
                
            </form>
        </body>';
    if(!isset($contenu)){
        $contenu="";
    }
    require_once('gabarit.php');
}

function afficherAccueilAgent(){
	$contenuCat='<form id="Agent" action="site.php" method="POST">
                        <fieldset> <legend> QUE VOULEZ-VOUS FAIRE ? </legend>
                                <input type="submit" value="Modifier les informations des clients" name="ModifInfoCli" />
                                <input type="submit" value="Rechercher un identifiant" name="ChercherId" />
                                <input type="submit" value="Synthese d\'un client" name="InfoCli" />
                                <input type="submit" value="Dépot ou retrait sur le compte d\'un client" name="DouRCompteCli" />
                                <input type="submit" value="Prendre RDV" name="PrendreRDV" />
                                <p><a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a></p>
                        </fieldset>
                </form>';
    
    
    require_once('gabarit.php');
}

function afficherModifierInfosClientAgent(){
    $contenu='<form id="ModifInfoCli" action="site.php" method="POST">
                        <fieldset> <legend> ENTREZ LES INFORMATIONS A MODIFIER </legend>
                                <p><label>Identifiant du client a modifier :</label><input type="text" name="IdCli"></p>
                                <p><label>Adresse :</label><input type="text" name="AdresseCli"></p>
                                <p><label>Numero de téléphone :</label><input type="text" name="NumTelCli"></p>
                                <p><label>Profession :</label><input type="text" name="ProfessionCli"></p>
                                <p><label>Situation familiale :</label><input type="text" name="SitFamiCli"></p>
                                <p> <input type="submit" value="Modifier" name="ModifierCli" /> </p>
                        </fieldset>
                </form>';
                
    $_SESSION['contenu']=$contenu;
}

    function afficherSyntheseClientAgent(){
       $contenu='<form id="InfoCli" action="site.php" method="POST">
                        <fieldset> <legend> SYNTHESE DU CLIENT </legend>
                                 <p><label>Donner l\'identifiant du client concerné :</label><input type="text" name="IdCli">
                                    <input type="submit" name="SyntheseClient" value="Synthese du client">
                                </p>
                        </fieldset>

                </form>';
        $_SESSION['contenu']=$contenu;
    }

//Agent
    function afficherDouRCompteClient(){ //appeler la fonction de nicolas dans le ctl apres celle ci
        $contenu='<form id="DouRCompteCli" action="site.php" method="POST">
                        <fieldset> <legend> DEBITER OU CREDITER UN CLIENT </legend>
                                <p><label>Donner l\'identifiant du client concerné :</label><input type="text" name="IdCli">
                                        <input type="submit" name="RechercherComptes" value="Rechercher les comptes">
                                </p>
                        </fieldset>
                </form>';
        $_SESSION['contenu']=$contenu;
    }

//Agent
    // à faire avant lesmotifs dans une var
    // récupe les 
    function afficherPrendreRDV($tabdemotifs){
        $contenu='<form id="PrendreRDV" action="site.php" method="POST">
                        <fieldset> <legend> PRENDRE RDV </legend>
                                <p><label>Donner le nom du conseillé</label><input type="text" name="NomConseille"></p>
                                <p><label>Donner le jour de départ</label><input type="date" name="DateDepart"></p>
                                <p>
                                        <input type="submit" name="VoirPlanning7j" value="Voir planning sur 7jours"></p>
                                <p><label>Donner l\'identifiant du client concerné :</label><input type="text" name="IdCli">
                                <p><label>Donner la date du RDV :</label><input type="date" name="DateRDV">
                                <p><label>Donner l\'heure du RDV :</label><input type="text" name="HeureRDV">
                                <p><label>Donner le login du conseillé :</label><input type="text" name="LoginConseille"></p>
                                <p><label>Motif du RDV:</label>
                                <select name="MotifRDV">';
            foreach($tabdemotifs as $ligne){
                    $contenu.='<option value="'.$ligne->nommotif.'">'.$ligne->nommotif.'</option>';
            }   
        $contenu.='</select> <p> <input type="submit" formaction="site.php" formmethod="POST" value="Ajouter RDV" name="CreationRDV"/> </p>';
        $contenu.='</fieldset>
                </form>'; //A APPELER DANS LE SITE LA FONCTION  afficherListeDesPJ($tab) avec tab le motif recuperé dans le select
        $_SESSION['contenu']=$contenu;
}

function afficherRechercherId(){
    $contenu='<form id="FormChercherId" action="site.php" method="POST"> 
                <fieldset> <legend> CHERCHER UN ID </legend>
            <p><label>Nom du client:</label><input type="text" name="NomClient"/></p>
            <p><label>Date de naissance du client:</label><input type="date" name="DateNaissanceClient"/></p>
            <p><input type="submit" value="Chercher un client" name="chercherUnClient"/></p></fieldset></form>';
            $_SESSION['contenu']=$contenu;
}

function afficherAccueilConseille(){
	$contenuCat='<form id="debutConseille" action="site.php" method="POST">
    <fieldset><legend> QUE VOULEZ-VOUS FAIRE ? </legend>
    <p>
        <input type="submit" value="voir planning" name="planning_conseiller" />
        <input type="submit" value="bloquer un créneau" name="creneau_conseiller" />
        <input type="submit" value="inscrire client" name="ajoutCli" />
        <input type="submit" value="vendre un contrat" name="vendreContrat" />
        <input type="submit" value="ouvrir compte" name="ouvrirCompte" />
        <input type="submit" value="modifier le decouvert" name="modifDecouvert" />
        <input type="submit" value="résilier contrat ou compte" name="resilier" />
        <p><a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a></p>
    </p>
    </fieldset>
    </form>';
    if(!isset($contenu)){
        $contenu="";
    }
	require_once('gabarit.php');
}

function afficherPlanningConseille(){  //si la date n'est pas mise alors c'est le planning du jour
    $contenu='<form id="planning_conseiller" action="site.php" method="POST">
        <fieldset><legend>PLANNING</legend>
        <p><label>Jour du planning :</label><input type="date" name="JourPlanning"></p> 
        <p><label>Login du conseillé:</label><input type="text" name="LoginC"></p>
        </fieldset>
        <p> <input type="submit" value="ajouter le client" name="nvcreneau" /></p>
    </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherPoserTaches(){
    $contenu='<form id="tache_conseiller" action="site.php" method="POST">
        <fieldset><legend>POSER UN CRENEAU</legend>
        <p><label>Votre login:</label><input type="text" name="LoginC"></p>
        <p><label>Jour:</label><input type="date" name="JourPlan"></p>
        <p><label>Heure:</label><input type="text" name="HeurePlan"></p>
        <p> <input type="submit" value="Bloquer le créneau" name="putcreneau" /></p>
    </form>';
        $_SESSION['contenu']=$contenu;
}


function afficherAjoutClient(){
    $contenu='<form id="ajoutCli"action="site.php" method="POST">
    <fieldset><legend>Ajouter un client :</legend>
        <p><label>login conseiller :</label><input type="text" name"loginC">
        <p><label>Nom du client :</label><input type="text" name="NomCli"></p>
        <p><label>Prenom du client :</label><input type="text" name="PrenomCli"></p>
        <p><label>Login du conseille</label><input type="text" name="LoginC"></p>
        <p><label>Date de naissance du Client :</label><input type="date" name="DateNaissanceCli"></p>
        <p><label>Adresse du client :</label><input type="text" name="AdresseCli"></p>
        <p><label>Numero de telephone du client :</label><input type="text" name="NumTelCli"></p>
        <p><label>Profession du client :</label><input type="text" name="ProfessionCli" ></p>
        <p><label>Situation familliale du client :</label><input type="text" name="SituFamilleCli"></p>
        <p> <input type="submit" value="ajouter le client" name="envoyerNewCli" />
        <input type="reset" value="Effacer" id="Eff"></p>
    </fieldset>
    </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherVendreContrat(){
    $contenu='<form id="vendreContrat" action="site.php" method="POST">
    <fieldset><legend>vendre un contrat :</legend>
        <p><label>Id du contrat :</label><input type="text" name="IdContrat"></p>
        <p><label>Id du client :</label><input type="text" name="Idcli"></p>
        <p><label>Nom du contrat :</label><input type="text" name="NomContrat"></p>
        <p><label>Date d\'ouverture :</label><input type="date" name="DateOuvertureContrat"></p>
        <p><label>Tarif mensuel du contrat :</label><input type="text" name="TarifContrat"></p>
        <p> <input type="submit" value="Créer le contrat" name="ContratVendu"/>
        <input type="reset" value="Effacer" id="Eff"></p>
    </fieldset>
    </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherOuvrirCompte(){
    $contenu='<form id="ouvrirCompte"action="site.php" method="POST">
    <fieldset><legend>ouvrir un compte :</legend>
        <p><label>Id du client :</label><input type="text" name="IdCli"></p>
        <p><label>Nom du compte :</label><input type="text" name="NomCompte"></p>
        <p><label>Date d\'ouverture des comptes :</label><input type="date" name="DateOuvertureCompte"></p>
        <p><label>Montant de découvert accorder :</label><input type="text" name="MontantDecouvert"></p>
        <p><input type="submit" value="ouvrir le compte" name="CompteOuvert"/>
        <input type="reset" value="Effacer" id="Eff"></p>
    </fieldset>
    </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherModifierDecouvert(){
    $contenu='<form id="modifDecouvert"action="site.php" method="POST">
    <fieldset><legend>modification d\'un découvert :</legend>
        <p><label>Id du compte :</label><input type="text" name="IDCompte"></p>
        <p><label>Id du client :</label><input type="text" name="Idcli" ></p>
        <p><label>Nom du client</label><input type="text" name="NomCli"></p>
        <p><label>Donner le nouveau découvert :</label><input type="text" name="NewDecouvert"></p>
        <p><input type="submit" value="changer le découvert" name="changerDecouvert" />
        <input type="reset" value="Effacer" id="Eff"></p>
    </fieldset>
    </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherResiliationContratCompte(){
    $contenu='<form id="Resilier" action="site.php" method="POST">
    <fieldset>
        <legend>Résilier un  contrat</legend>
            <p><label>Id du compte/contrat :</label><input type="text" name="IdResilier"></p>
            <p><input type="submit" name="Résilier un compte" value="Résilier un compte" id="ResilierCompte"/>
            <input type="submit" formaction="site.php" formmethod="POST" value="ResilierContrat" name="Résilier un contrat"/></p> 
    </fieldset>
    </form>';
    $_SESSION['contenu']=$contenu;
}


function afficherAccueilDirecteur(){
	$contenuCat='<form id="debutDirecteur" action="site.php" method="POST">
            <fieldset>
                    <p>
                        <input type="submit" value="accès des employer" name="ModifLogEmploye" />
                        <input type="submit" value="Créer/Modifier/Supprimer un contrat" formaction="site.php" formmethod="POST" name="C/M/S_Contrat" />
                        <input type="submit" value="Modifier la liste du pièce à fournir" formaction="site.php" formmethod="POST" name="C/M/S_Piece" />
                        <input type="submit" value="Statistique" formaction="site.php" formmethod="POST" name="Stat" />
                        <p><a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a></p>
                    </p>
                </fieldset>
            </form>';
            if(!isset($contenu)){
                $contenu="";
            }
            require_once('gabarit.php');
}



function afficherAccesEmploye(){
	$contenu='<form id="AccesEmploye" action="site.php" method="POST">
                        <fieldset><legend>Acces des Employer</legend>
                                <p><label>Nom :</label><input type="text" name="NomAChange" /></p>
                                <p><label>Prenom :</label><input type="text" name="PrenomAChanger"/></p>
                                <p><label>Login :</label><input type="text" name="LoginChange" /></p>
                                <p><label>Mot de Passe :</label><input type="text" name="MDPChange" /></p>
                                <p><label>Categorie :</label><input type="text" name="CatChange" /></p>
                                <p><input type="submit" value="Créer employé" name="CreerEmploye" id="CreerEmployer">
                                <p><label>Ancient login :</label><input type="text" name="Login" /></p>
                                <p><label>Nouveau login :</label><input type="text" name="NouveauLoginChange" /></p>
                                <p><label>Nouveau mot de passe :</label><input type="text" name="MDP" /></p>
                                <input type="submit" formaction="site.php" formmethod="POST" value="ModifAcces" name="modifier_acces"/>
                                <input type="reset" formaction="site.php" formmethod="POST" value="Effacer" name="Effacer"/></p>
                        </fieldset>
                </form>';
    $_SESSION['contenu']=$contenu;
}

function afficherChangeContrat($tabdemotifs){
	$contenu= '<form id="ChangeContrat" action="site.php" method="POST">
                        <fieldset><legend>Changer un Contrat</legend>
                                <p><label>Id du contrat/compte :</label><input type="text" name="IDModifContrat"></p>
                                <p><label>Piece a donner:</label><input type="text" name="IDModifContrat"></p>
                                <p><label>Piece a donner:</label><input type="text" name="IDModifContrat"></p>
                                <p><label>Type de contrat/compte</label><select name="MotifRDV">';
            foreach($tabdemotifs as $ligne){
                    $contenu.='<option value="'.$ligne->nommotif.'">'.$ligne->nommotif.'</option>';
            }   
        $contenu.='</select> <p> <input type="submit" formaction="site.php" formmethod="POST" value="Ajouter RDV" name="CreationRDV"/> </p>';
        $contenu.='</fieldset>
                </form>'; //A APPELER DANS LE SITE LA FONCTION  afficherListeDesPJ($tab) avec tab le motif recuperé dans le select
        $_SESSION['contenu']=$contenu;'</p>
                                <p><input type="submit" value="Contrat créé" name="ContratCree">
                                        <input type="submit" formaction="site.php" formmethod="POST" name="ContratModif" value="Contrat modifier"/>
                                        <input type="submit" formaction="site.php" formmethod="POST" name="ContratSupp" value="Contrat supprimer"/>
                                <input type="reset" formaction="site.php" formmethod="POST" value="Eff" name="Effacer"/></p>

                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
            
}

function afficherListePiece(){
	$contenu='<form id="ListePiece" action="site.php" method="POST">
                        <fieldset><legend>Liste Piece à Fournir</legend>
                                <p><label>nom de la piece:</label><input type="text" name="NomPiece" ></p>
                                <p><label>nom du motif:</label><input type="text" name="NomMotif" ></p
                                <p><input type="submit" value="Piece créé" name="PieceCree">
                                <input type="submit" value="Piece modifier" name="PieceModif">
                                <input type="submit" formaction="site.php" formmethod="POST" value="Piece supprimer" name="PieceSupp">
                                <input type="reset" formaction="site.php" formmethod="POST" value="Effacer" name="Effacer"/></p>
                                
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
}
function afficherStat(){
	                $contenu='<form id="Stat" action="site.php" method="POST">
                        <fieldset><legend>Statistique à voir</legend> 
                                <input type="submit" value="Contrat" name="StatContrat" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Rendez-vous" name="StatRDV" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Nombre Client" name="StatCli" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Solde Client" name="StatSomme" />
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;

}
function afficherStratDateContrat(){
    $contenu='<form id="DateContratStat" action="site.php" method="POST">
                        <fieldset><legend>Date a donner :</legend>
                                <p><label>date de debut:</label><input type="date" name="IDDate1Contrat" ></p>
                                <p><label>date de fin:</label><input type="date" name="IDDate2Contrat" ></p>
                                <p><input type="submit" name="OkayContratStat" value="valider "></p>
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
}
function afficherStratDateRDV(){
    $contenu='<form id="DateRDVStat" action="site.php" method="POST">
                        <fieldset><legend>Date a donner :</legend>
                                <p><label>date de debut:</label><input type="date" name="IDDate1RDV" ></p>
                                <p><label>date de fin:</label><input type="date" name="IDDate2RDV" ></p>
                                <p><input type="submit" name="OkayRDVStat" value="valider "></p>
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
}
function afficherStratDateClients(){
    $contenu='<form id="DateClientStat" action="site.php" method="POST">
                        <fieldset><legend>Date a donner :</legend>
                                <p><label>date :</label><input type="date" name="IDDateClient" ></p>
                                <p><input type="submit" name="OkayClientStat" value="valider "></p>
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
}
function afficherStratDateSomme(){
    $contenu='<form id="DateSommeStat" action="site.php" method="POST">
                        <fieldset><legend>Date a donner :</legend>
                                <p><label>date :</label><input type="date" name="IDDateSomme" ></p>
                                <p><input type="submit" name="OkaySommeStat" value="valider "></p>
                        </fieldset>
                </form>';
                $_SESSION['contenu']=$contenu;
}
function afficherListeDesPJ($tab){
    $contenu.="<p>Liste des pieces à apporter pour le RDV :</p>";
    foreach($tab as $ligne){
        $contenu.="<p>".$ligne->pieces."</p>";
    }
    $_SESSION['contenu']=$contenu;
}

function afficherStatsContrats($tab){
    $contenu="";
    foreach($tab as $ligne){
    $contenu.="<p> Le nombre de contrats souscrits entre les deux dates est de ".$ligne->nb.".</p>";
    }
    $_SESSION['contenu']=$contenu;
}

function afficherStatsRDV($tab){
    $contenu="";
    foreach($tab as $ligne){
    $contenu.="<p> Le nombre de RDV pris par des agents entre les deux dates est de ".$ligne->nb.".</p>";
    }
    $_SESSION['contenu']=$contenu;
}

function afficherStatsClients($tab){
    $contenu="";
    foreach($tab as $ligne){
    $contenu.="<p> Le nombre de clients de la banque à cette date est de ".$ligne->nb.".</p>";
    }
    $_SESSION['contenu']=$contenu;
}

function afficherStatsSomme($tab){
    $contenu="";
    foreach($tab as $ligne){
    $contenu.="<p> Le solde total tous clients confondus à cette date est de ".$ligne->somme.".</p>";
    }
    $_SESSION['contenu']=$contenu;
}

function afficheridentifiantClient($tab){
    foreach($tab as $ligne){
    $contenu="<p> Le client à l'identifiant suivant : ".$ligne->idlci.".</p>";
    }
    $_SESSION['contenuForm']=$contenu;
}

function afficherPlanning1jour1employe($tab){
    $h=8;
    $contenu="";
    /*$tailletabcase2 = sizeof(array($tab[1]));
    foreach($tab as $ligne){
        $contenu.="<table> <tr> <th colspan='2'>Planning de '. $ligne->nomemploye.' '.$ligne->prenomemploye .' le '.$ligne->dateevenement.'</th> </tr> <tr>";
        break;
    }
    foreach ($tab as $planning){
        $contenu.="<tr> <th>".$h."h00 </th>";
        if (($planning->heure)-8==$h){
            $listedespieces=$planning->nompieces;
            $motif=$planning->nommotif;
            $categorie=$planning->categorierdv;
            $idclient=$planning->idcli;
            if (!isset($idclient)){
                if ($categorie=="tache"){
                    $contenu.="<td> Tâches administratives </td> </tr>";
                }
                else{
                    $contenu.="<td> <a href=# onclick= 'poppassynthese($h,$listedespieces,$motif)>Informations</a> <div id=$h></div> </td> </tr>";
                }
            }
            else{
                for ($j=0; $j<$tailletabcase2; $j++){
                    if ($tab[1][$j][0]==$idclient){
                        foreach ($tab[1][$j][1] as $ligne){
                            $nomcli=$ligne->nomcli;
                            $prenomcli=$ligne->prenomcli;
                            $idcli=$ligne->idcli;
                            $datenaissaice=$ligne->datenaissance;
                            $professioncli=$ligne->professioncli;
                            $situationfamcli=$ligne->siruationfamcli;
                            $numtelcli=$ligne->numtelcli;
                            $adressecli=$ligne->adressecli;
                            $login=$ligne->login;
                        }
                        foreach ($tab[1][$j][2] as $ligne){
                            $nomcompte=$ligne->nomcompte;
                            $solde=$ligne->solde;
                        }
                        foreach ($tab[1][$j][3] as $ligne){
                            $nomcontrat=$ligne->nomcontrat;
                            $tarifc=$ligne->tarifmensuel;
                        }
                        $contenu.="<td> <a href=# onclick='popsynthese($h,$nomcli,$prenomcli,$idcli,$datenaissance,$profession,$situationfamcli,$numtelcli,$adressecli,$login,$nomcompte,$solde,$nomcontrat,$tarifc)'>Informations RDV</a> <div id=$h></div> </td> </tr>";
                    }
                } 
            }
            $h=$h++;
        }
    }
    $contenu.="</table>";*/
    $contenu.="<label>Le Planning n'est pas accessible pour le moment";
    $_SESSION['contenuForm']=$contenu;
}

function afficherSynthese($tabclient,$tabcontrat,$tabcompte){ 
    if (!isset($contenu)){                                     
        $contenu="";                                           
    }
    foreach($tabclient as $ligne){                                     
        $contenu.="<form name='AffSys' method='POST' action='site.php'><legend>Synthese du client n°".$ligne->idcli." ";
    }
    foreach($tabclient as $ligne){
        $contenu.="</br> <p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."   |   Date de naissance :".$ligne->datenaissance."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : ".$ligne->situationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        $contenu.="<p> Conseillé :".$ligne->login."</p>";
        break;
    }
    foreach($tabcompte as $ligne){
        $contenu.="<p> Compte : ".$ligne->nomcompte." avec un solde de ".$ligne->solde."</p>";
    }
    foreach($tabcontrat as $ligne){
        $contenu.="<p> Contrat : ".$ligne->nomcontrat." avec un tarif mensuel de ".$ligne->tarifmensuel."</p>";
    }
    $contenu.="</form>";
    $_SESSION['contenuForm']=$contenu;
}

//checkbox
//tab des comptes
    // en fonction de l'id 
    function afficherLesComptes($tab){
        $contenu="";
        foreach ($tab as $ligne) {
            $contenu.="<form name='formAffCom' method='POST' action='site.php' onsubmit='return verifActionCompte()'><fieldset><legend>Gestion du ou des compte(s) du client n°".$ligne->idcli."</legend>";
            break;
        }
        foreach ($tab as $compte) {
            $idc=$compte->idcompte;
            $decouvert=$compte->montantdecouvert;
            $solde=$compte->montantdecouvert;
            $contenu.="<p><input type='radio' value='Compte n°$idc' name='compteChoisi' onfocus='afficheDecouvertEtSolde($idc,$decouvert,$solde)'/><label>  Compte numero ".$compte->idcompte." de type ".$compte->nomcompte." ouvert le ".$compte->dateouverture.". </label></p>";
        }
        $contenu.="<br>
                   <p><label>Le numéro du compte sélectionné :  </label><input type='text' name='compte' readonly/></p>
                   <p><label>Le solde du compte sélectionné :  </label><input type='text' name='solde' readonly/></p>
                   <p><label>Le découvert du compte sélectionné :  </label><input type='text' name='decouvert' readonly/></p>
                   <p><label>le montant à débiter/créditer :  </label><input type='text' name='montant' required/></p>
                   <p><label>Débiter</label> <input type='radio' id='debit' name='choix'/></p>
                   <p><label>Créditer</label><input type='radio' id='credit'name='choix'/>  
                   </p>
                   </br>";
                
        $contenu.="<p><input type='submit' value='Effectuer l'opération' /><p id='operation'></p></fieldset></form>";
        $_SESSION['contenuForm']=$contenu;
    }
//la fonction qui fait pop l'id client
function afficherIdClient($tab){
    $contenu="";
    $contenu.='<fieldset> <legend>Résultat de la recherche</legend>';
    foreach($tab as $ligne){
        $contenu.='<p> l\'id du client est :  '.$ligne->idcli.'</p>';
    }
    $contenu.='</fieldset>';
    $_SESSION['contenuForm']=$contenu;
}

function afficherErreurdeco($erreur){
        $contenuCat="";
        $contenu='<p>'.$erreur.'</p>
        <p><a href=site.php name="retour">Retour au site</a>';
        $_SESSION['contenuForm']=$contenu;
        require_once('gabarit.php');
    }    
function afficherErreurco($erreur){
    $contenuCat="";
    $_SESSION['contenuBackup']=$_SESSION['contenu'];
    $_SESSION['contenu']="";
    $contenu='<p><div class="erreur">'.$erreur.'</div></p>
    <p><a href=site.php name="retour">Retour au site</a>';
    $_SESSION['contenuForm']=$contenu;
    require_once('gabarit.php');
}
/*
faire les vues de l'acceuil en fonction de la catégorie du client
Ne pas oublier de changer le mcd */