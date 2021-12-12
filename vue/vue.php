<?php

function afficherPlanning1jour1employe($tab){
    $h=8
    foreach ($tab as $ligne){
         $contenu="<table> <tr> <th colspan='2'>Planning de '. $ligne->nomemploye.' '.$ligne->prenomemploye .' le '.$ligne->dateevenement.'</th> </tr> <tr>";
         break;
    }
    for ($i=0;i<10;i++){
    $contenu.="<tr> <th>".$h."</th>";
        foreach ($tab as $ligne){
            if (($ligne->heure)-8==$h){ //bien faire si on trouve dans le tableau
                if (($ligne->idcli)!=null))
                    $contenu.="<td>";<a href=# onclick=return maFonction()>Lien</a>

            }
        }
    }
}


function afficherSynthese($tab){
    if ($contenu==null){
        $contenu="";
    }
    foreach($tab as $ligne){
        $contenu.="<p> Client : ".$ligne->nomcli." ".$ligne->prenomcli."   |   Identifiant : ".$ligne->idcli."</p>";
        $contenu.="<p> Profession : ".$ligne->professioncli."   |   Situation familiale : "<ligne->siruationfamcli."</p>";
        $contenu.="<p> Contact : joignable au ".$ligne->numtelcli." et habitant au ".$ligne->adressecli."</p>";
        break
    }
    foreach ($tab as $ligne){
            <situationfcli></situationfcli>
        </ligne->
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