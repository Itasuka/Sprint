<!DOCTYPE html>
<html lang="fr">
 		<head>
   			 <meta charset="utf-8">
   			 <link rel="stylesheet">
        </head>
        <body>
        	<form id="debutConseille" action="site.php" method="POST">
        		<fieldset>
        		<p>
				<input type="submit" value="voir planning" name="planning_conseiller" />
				<input type="submit" value="inscrire client" name="ajoutCli" />
				<input type="submit" value="vendre un contrat" name="vendreContrat" />
				<input type="submit" value="ouvrir compte" name="ouvrirCompte" />
				<input type="submit" value="modifier le decouvert" name="modifDecouvert" />
				<input type="submit" value="résilier contrat ou compte" name="resilier" />
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
        			<p><label>date d'ouverture :</label><input type="date" name="DateOuvertureContrat"></p>
        			<p><label>Tarif mensuel du contrat :</label><input type="text" name="TarifContrat"></p>
        			<p> <input type="submit" value="Créé le contrat" name="ContratVendu" /> </p>
        		</fieldset>
        	</form>
        	<form id="ouvrirCompte"action="site.php" method="POST">
        		<fieldset>
        			<p><label>Id du nouveau compte:</label><input type="text" name="IDNewCompte"></p>
        			<p><label>Id du client:</label><input type="text" name="IdCli"></p>
        			<p><label>nom du client:</label><input type="text" name="NomCli"></p>
        			<p><label>Date d'ouverture du compte: </label><input type="date" name="DateOuvertureCompte"></p>
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
        	</form>

        </body>

</html>