<!DOCTYPE html>
<html lang="fr">
 		<head>
   			 <meta charset="utf-8">
   			 <link rel="stylesheet">
        </head>
        <body>
                <form id="Agent" action="site.php" method="POST">
                        <fieldset>
                        <p>
                                <input type="submit" value="modifier les informations des clients" name="ModifTnfoCli" />
                                <input type="submit" value="systhese d'un client" name="InfoCli" />
                                <input type="submit" value="dépot ou retrait sur le compte d'un client" name="DouRCompteCli" />
                                <input type="submit" value="Prendre rdv" name="PrendreRDV" />
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
                </form>
        </body>