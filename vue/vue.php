<?php

function afficherPlanning1jour1employe($tab){
$h=8
$tailletabcase2 = sizeof($tab[1])
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
            if ($idclient==null){
                if ()
                $contenu.="<td> <a href=# onclick= ($h)>Informations RDV</a> <div id=$h></div> </td> </tr>";
            }
            else{
                for ($j=0; $j<$tailletabcase2; $j++){
                    if ($tab[1][$j][0]==$idclient){
                        $contenu.="<td> <a href=# onclick='popsynthese($h,$tab[1][$j][1],$tab[1][$j][2],$tab[1][$j][3],$listedespieces,$motif)'>Informations RDV</a> </td> </tr>";
            }
        }
     } $h=$h++;
}

function afficherSyntheseRDV($tabclient,$tabcontrat,$tabcompte,$listePJ,$motif){
    function afficherSynthese($tabclient,$tabcontrat,$tabcompte);
    $contenu2=$contenu;
    $contenu2.="<p> Motif RDV : ".$motif."   |   Liste des pièces justificatives : ".$listePJ
}

    function afficherSynthese($tabclient,$tabcontrat,$tabcompte){
    if ($contenu==null){
        $contenu="";
    }
    foreach($tabclient as $ligne){
        $contenu.="</br> <p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : "ligne->siruationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        $contenu.="<p> Conseillé :".$ligne->login."</p>";
        break
    }
    foreach($tabcompte as $ligne){
        $contenu.="<p> Compte : ".$ligne->nomCompte." avec un solde de ".$ligne->solde."</p>";
    }
    foreach($tabcontrat as $ligne){
        $contenu.="<p> Contrat : ".$ligne->nomContrat."</p>";
    }

}

function afficherErreur($erreur){
    $contenu='<p>'$erreur'</p>';
    require_once('gabarit.php');
}

function afficherAcceuil(){
    $contenu="";
    require_once('gabarit.php');
}