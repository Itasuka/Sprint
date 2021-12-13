<?php

function afficherIndex(){
    $contenuCat='<body>
            <form method="POST" action="site.php">
                <fieldset>
                    <legend> Veillez saisir votre login et votre mots de passe </legend>
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

function afficherAcceuilDirecteur(){
	$contenuCat='<form id="directeur" action="site.php" method="POST">
                    <a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a>
                </form>';
    $contenu="";
	require_once('gabarit.php');
}

function afficherAcceuilAgent(){
	$contenuCat='<form id="Agent" action="site.php" method="POST">
                        <fieldset>
                        <p>
                                <input type="submit" value="modifier les informations des clients" name="ModifTnfoCli" />
                                <input type="submit" value="systhese d\'un client" name="InfoCli" />
                                <input type="submit" value="dépot ou retrait sur le compte d\'un client" name="DouRCompteCli" />
                                <input type="submit" value="Prendre rdv" name="PrendreRDV" />
                                <a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a>
                        </fieldset>
                </form>
                <form id="ModifTnfoCli" action="site.php" method="POST">
                        <fieldset>
                                <p><legend>donner le nom du client concerner :</legend><input type="text" name="NomCli">

                                </p>
                        </fieldset>
                        <fieldset>
                                <p><legend>adresse :</legend><input type="text" name="adresseCli"></p>
                                <p><legend>numero de téléphone</legend><input type="text" name="NumTelCli"></p>
                                <p><legend>mail</legend><input type="text" name="MailCli"></p>
                                <p><legend>profession :</legend><input type="text" name="ProfessionCli"></p>
                                <p><legend>situation familiale </legend><input type="text" name="SitFamiCli"></p>
                        </fieldset>
                </form>
                <form id="InfoCli" action="site.php" method="POST">
                        <fieldset>
                                <p><legend>donner le nom du client concerner :</legend><input type="text" name="NomCli">
                                        <input type="submit" name="validerNomCli" value="Systhese client">
                                </p>
                        </fieldset>

                </form>
                <form id="DouRCompteCli" action="site.php" method="POST">
                        <fieldset>
                                <p><legend>donner le nom du client concerner :</legend><input type="text" name="NomCli">
                                        <input type="submit" name="validerNomCli" value="Systhese client">
                                </p>
                        </fieldset>
                </form>
                <form id="PrendreRDV" action="site.php" method="POST">
                        <fieldset>
                                
                        </fieldset>
                </form>';
    if(!isset($contenu)){
        $contenu="";
    }
	require_once('gabarit.php');
}

function afficherAcceuilConseille(){
	$contenuCat='<form id="debutConseille" action="site.php" method="POST">
                <fieldset>
                <p>
                <input type="submit" value="voir planning" name="planning_conseiller" />
                <input type="submit" value="inscrire client" name="ajoutCli" />
                <input type="submit" value="vendre un contrat" name="vendreContrat" />
                <input type="submit" value="ouvrir compte" name="ouvrirCompte" />
                <input type="submit" value="modifier le decouvert" name="modifDecouvert" />
                <input type="submit" value="résilier contrat ou compte" name="resilier" />
                <a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a>
            </p>
                </fieldset>
            </form>
            <form id="planning_conseiller"action="site.php" method="POST">
                <fieldset>
                </fieldset>
            </form>
            <form id="ajoutCli"action="site.php" method="POST">
                <fieldset>
                    <p><label>nom du client :</label><input type="text" name="NomCli"></p>
                    <p><label>prenom du client :</label><input type="text" name="PrenomCli"></p>
                    <p><label>id du client :</label><input type="text" name="Idcli"></p>
                    <p><label>date de naissance du client :</label><input type="date" name="DateNaissanceCli"></p>
                    <p><label>adresse du client :</label><input type="text" name="AdresseCli"></p>
                    <p><label>numero de telephone du client :</label><input type="text" name="NumTelCli"></p>
                    <p><label>profession du client :</label><input type="text" name="ProfessionCli"></p>
                    <p><label>situation familiale du client :</label><input type="text" name="SituFamilleCli"></p>
                    <p> <input type="submit" value="ajouter le client" name="envoyerNewCli" /> </p>
                </fieldset>
            </form>
            <form id="vendreContrat"action="site.php" method="POST">
                <fieldset>
                    <p><label>id du contrat :</label><input type="text" name="IdContrat"></p>
                    <p><label>id du client :</label><input type="text" name="Idcli"></p>
                    <p><label>nom du contrat :</label><input type="text" name="NomContrat"></p>
                    <p><label>date d\'ouverture :</label><input type="date" name="DateOuvertureContrat"></p>
                    <p><label>Tarif mensuel du contrat :</label><input type="text" name="TarifContrat"></p>
                    <p> <input type="submit" value="Créé le contrat" name="ContratVendu" /> </p>
                </fieldset>
            </form>
            <form id="ouvrirCompte"action="site.php" method="POST">
                <fieldset>
                    <p><label>Id du nouveau compte:</label><input type="text" name="IDNewCompte"></p>
                    <p><label>Id du client:</label><input type="text" name="IdCli"></p>
                    <p><label>nom du client:</label><input type="text" name="NomCli"></p>
                    <p><label>Date d\'ouverture du compte: </label><input type="date" name="DateOuvertureCompte"></p>
                    <p><label>Mondant du découvert accorder :</label><input type="text" name="MontantDecouvert"></p>
                    <p> <input type="submit" value="ouvrir le compte" name="CompteOuvert" /> </p>
                </fieldset>
            </form>
            <form id="modifDecouvert"action="site.php" method="POST">
                <fieldset>
                    <p><label>Id du compte:</label><input type="text" name="IDCompte"></p>
                    <p><label>Id du chient:</label><input type="text" name="Idcli"></p>
                    <p><label>nom du client:</label><input type="text" name="NomCli"></p>
                    <p><label>Nouveau montant de découvert</label><input type="text" name="NewDecouvert"></p>
                    <p> <input type="submit" value="changer le découvert" name="changerDecouvert" /> </p>
                </fieldset>
            </form>';
    if(!isset($contenu)){
        $contenu="";
    }
	require_once('gabarit.php');
}

function afficherStatsContrats($tab){
    foreach($tab as $ligne){
    $contenu="Le nombre de contrats souscrits entre les deux dates est de ".$ligne->nb.".</p>";
    }
    require_once('gabarit_Directeur.php');
}

function afficherStatsRDV($tab){
    foreach($tab as $ligne){
    $contenu="<p> Le nombre de RDV pris par des agents entre les deux dates est de ".$ligne->nb.".</p>";
    }
    require_once('gabarit_Directeur.php');
}

function afficherStatsClients($tab){
    foreach($tab as $ligne){
    $contenu="<p> Le nombre de clients de la banque à cette date est de ".$ligne->nb.".</p>";
    }
    require_once('gabarit_Directeur.php');
}

function afficherStatsSomme($tab){
    foreach($tab as $ligne){
    $contenu="<p> Le solde total tous clients confondus à cette date est de ".$ligne->somme.".</p>";
    }
    require_once('gabarit_Directeur.php');
}

function afficheridentifiantClient($tab){
    foreach($tab as $ligne){
    $contenu="<p> Le client à l'identifiant suivant : ".$ligne->idlci.".</p>";
    }
}

function afficherPlanning1jour1employe($tab){
    $h=8;
    $tailletabcase2 = sizeof($tab[1]);
    foreach($tab[0] as $ligne){
        $contenu="<table> <tr> <th colspan='2'>Planning de '. $tab[0]->nomemploye.' '.$tab[0]->prenomemploye .' le '.$tab[0]->dateevenement.'</th> </tr> <tr>";
        break;
    }
    foreach ($tab[0] as $planning){
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
                        $contenu.="<td> <a href=# onclick='popsynthese($h,$tab[1][$j][1],$tab[1][$j][2],$tab[1][$j][3],$listedespieces,$motif)'>Informations RDV</a> <div id=$h></div> </td> </tr>";
                    }
                }
                $h=$h++;
            } 
        }
    }
}

function afficherSyntheseRDV($tabclient,$tabcontrat,$tabcompte,$listePJ,$motif){
    afficherSynthese($tabclient,$tabcontrat,$tabcompte);
    $contenu2=$contenu;
    $contenu2.="<p> Motif RDV : ".$motif."   |   Liste des pièces justificatives : ".$listePJ;
}

function afficherSynthese($tabclient,$tabcontrat,$tabcompte){
    if (!isset($contenu)){
        $contenu="";
    }
    foreach($tabclient as $ligne){
        $contenu.="</br> <p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : ".$ligne->siruationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        $contenu.="<p> Conseillé :".$ligne->login."</p>";
        break;
    }
    foreach($tabcompte as $ligne){
        $contenu.="<p> Compte : ".$ligne->nomCompte." avec un solde de ".$ligne->solde."</p>";
    }
    foreach($tabcontrat as $ligne){
        $contenu.="<p> Contrat : ".$ligne->nomContrat."</p>";
    }
}

//checkbox
//tab des comptes
    // en fonction de l'id 
function afficherLesComptes($tab){
    foreach ($tab as $ligne) {
        $contenu="<form name='formAffCom' method='POST' action='site.php' onsubmit='return verifActionCompte()><fieldset><legend>Gestion du ou des compte(s) du client n°".$ligne->idcli."</legend>";
        break;
    }
    foreach ($tab as $compte) {
        $contenu.="<p><input type='radio' name='compteChoisi' onfocus='afficheDecouvertEtSolde("$compte->idcompte.",".$compte->montantdecouvert.",".$compte->solde.")'/><label>  Compte numero ".$compte->idcompte." de type ".$compte->nomCompte." ouvert le ".$compte->dateouverture.". </label></p>";
    }
    $contenu.="<p><label>Le numéro du compte sélectionné :  </label><input type='text' id='compte' readonly/></p>
               <p><label>Le solde du compte sélectionné (en euros) :  </label><input type='text' id='solde' readonly/></p>
               <p><label>Le découvert maximum du compte sélectionné (en euros) :  </label><input type='text' id='decouvert' readonly/></p>
               <p><label>Veuillez indiquer le montant à débiter/créditer (en euros) :  </label><input type='text' id='montant' required/></p>
               <p><label>Choisissez l'action à effectuer :  Débiter  </label><input type='radio' id='debit'/>   Créditer  <input type='radio' id='credit'</p>";
    $contenu.="<input type='submit' value='Effectuer l'opération' /><p id='erreurcompte'></p>";
}

function afficherErreurdeco($erreur){
    $contenuCat="";
    $contenu='<p>'.$erreur.'</p>
    <p><a href=site.php name="retour">Retour au site</a>';
    require_once('gabarit.php');
}    


function afficherErreurco($erreur){
    $contenuCat="";
    $contenu='<p>'.$erreur.'</p>
    <p><a href=site.php name="retour">Retour au site</a>';
    require_once('gabarit.php');
}



/*
faire les vues de l'acceuil en fonction de la catégorie du client

Ne pas oublier de changer le mcd */