<?php
require_once('connect.php');

function getConnect(){
    $connexion=new PDO('mysql:host='.SERVEUR.';dbname='.BDD,USER,PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->query('SET NAMES UTF8');
    return $connexion;
}

//on recherche les clients ayant tel nom et telle date de naissance, retourne un tableau des id des ces clients
function chercherUnIdClient($nomclient,$datenaissanceclient){
    $connexion=getConnect();
    $requete="select idcli from client where nomcli='$nomclient' and datenaissancecli='$datenaissance'";
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableaudesclients=$resultat->fetchall();
    $resultat->closeCursor();
    return $tableaudesclients;
}

function syntheseClient($id){
    $connexion=getConnect();
    $requete="select *,*,*,nomemploye from client natural join contrat natural join compte natural join employe"
    $resultat=$connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $tableauduclient=$resultat->fetchall();
    $resultat->closeCursor();
    return $tableauduclient;
}

function creerEmploye($id,$mdp,$nom,$prenom,$categorie){
    $connexion=getConnect();
    $requete="insert into employe values ($id, '$mdp', '$nom', '$prenom', '$categorie')" ; 
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

//bien chercher l'employer à modifier avant d'utiliser cette méthode pour avoir la valeur $id
function modifierEmploye($id,$newid,$mdp){
    $connexion=getConnect();
    $requete="modify into employe values ($newid, '$mdp', '$nom', '$prenom', '$categorie') where id='$id'" ;
    $resultat=$connexion->query($requete);
    $resultat->closeCursor();
}

