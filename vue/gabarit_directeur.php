<!DOCTYPE html>
<html lang="fr">
 		<head>
   			 <meta charset="utf-8">
   			 <link rel="stylesheet" href="style/style.css">
        </head>
        <body>
        <header>
                <a href="site.php?action=logout" title="Déconnexion">Se déconnecter</a>
        </header> 
                <form id="debutDirecteur" action="site.php" method="POST">
                        <fieldset>
                                <p>
                                        <input type="submit" value="accès des employer" name="ModifLogEmployer" />
                                        <input type="submit" value="créé/modif/supp un contrat" formaction="site.php" formmethod="POST" name="C/M/S_Contrat" />
                                        <input type="submit" value="la liste du pièce à fournir" formaction="site.php" formmethod="POST" name="C/M/S_Piece" />
                                        <input type="submit" value="Statistique" formaction="site.php" formmethod="POST" name="Stat" />
                                </p>
                        </fieldset>
                </form>
                <form id="AccesEmploye" action="site.php" method="POST">
                        <fieldset><legend>Acces des Employer</legend>
                                <p><label>Nom :</label><input type="text" name="NomAChange" /></p>
                                <p><label>Prenom :</label><input type="text" name="PrenomAChanger"/></p>
                                <p><input type="submit" name="Créé employer" id="CreeEmployer">
                                <input type="submit" formaction="site.php" formmethod="POST" value="ModifAcces" name="modifier accès"/>
                                <input type="reset" formaction="site.php" formmethod="POST" value="Eff" name="Effacer"/></p>
                        </fieldset>
                </form>
                <form id="ChangeContrat" action="site.php" method="POST">
                        <fieldset><legend>Changer un Contrat</legend>
                                <p><input type="submit" value="Créé un contrat" name="CreeContrat" />
                                        <input type="submit" formaction="site.php" formmethod="POST" value="ModifContrat" name="modifier Contrat"/>
                                        <input type="submit" formaction="site.php" formmethod="POST" value="SuppContrat" name="CreationRDV"/>
                                </p>
                                <p><label>Id du contrat :</label><input type="text" name="IDModifContrat"></p>
                                <p><label>Id du client :</label><input type="text" name="IDModifContratCli"></p>
                                <p><label>Nom du contrat :</label><input type="text" name="IDModifNomContrat"></p>
                                <p><label>Date d\'ouverture :</label><input type="date" name="IDModifDateOu"></p>
                                <p><label>Montant du contrat :</label><input type="text" name="IDModifMontant"></p>
                                <p><input type="submit" name="Contrat Créé" id="ContratCree">
                                        <input type="submit" formaction="site.php" formmethod="POST" value="ContratModif" name="Contrat modifier"/>
                                        <input type="submit" formaction="site.php" formmethod="POST" value="ContratSupp" name="Contrat supprimer"/>
                                <input type="reset" formaction="site.php" formmethod="POST" value="Eff" name="Effacer"/></p>

                        </fieldset>
                </form>
                <form id="ListePiece" action="site.php" method="POST">
                        <fieldset><legend>Liste Piece à Fournir</legend>
                                <p><input type="submit" value="Créé un piece" name="CreeContrat" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Modifier une piece" name="ModifCotrat" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Supprimer une piece" name="SuppContrat" />
                                </p>
                                <p><label>Nom du contrat:</label><input type="text" name="IDPieceContrat" ></p>
                                <p><label>Pièce du contrat:</label><input type="text" name="IDPieceSuite" ></p>
                                <p><input type="submit" name="Piece créé" id="PieceCree">
                                <input type="submit" name="Piece modifier" id="PieceModif">
                                <input type="submit" formaction="site.php" formmethod="POST" name="Piece supprimer" id="PieceSupp">
                                <input type="reset" formaction="site.php" formmethod="POST" value="Eff" name="Effacer"/></p>
                                
                        </fieldset>
                </form>
                <form id="Stat" action="site.php" method="POST">
                        <fieldset><legend>Statistique à voir</legend> 
                                <input type="submit" value="Contrat" name="StatContrat" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Rendez-vous" name="StatRDV" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Nombre Client" name="StatCli" />
                                <input type="submit" formaction="site.php" formmethod="POST" value="Solde Client" name="StatSomme" />
                        </fieldset>
                </form>

        </body>