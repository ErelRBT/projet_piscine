<?php

?>
<!DOCTYPE html>
<html>
<head>
    <title>Traitement</title>
</head>
<body>
<?php
//identifier le nom de base de données
$database = "projet_piscine";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement

echo "<form action=compte.php method=post>
        <table border=1>
        <tr>
                <td>Nom:</td>
                <td><input type=text name=nom></td>
            </tr>

            <tr>
                <td>Prénom:</td>
                <td><input type=text name=prenom></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type=text name=email></td>
            </tr>

            <tr>
                <td>Mot de passe:</td>
                <td><input type=password name=MDP></td>
            </tr>
            
            <tr>
                <td>Adresse:</td>
                <td><input type=texte name=adresse></td>
            </tr>
            
            <tr>
                <td>Ville:</td>
                <td><input type=texte name=ville></td>
            </tr>
            
            <tr>
                <td>Code postal:</td>
                <td><input type=number name=CP></td>
            </tr>
            
            <tr>
                <td>Pays:</td>
                <td><input type=texte name=Pays></td>
            </tr>
            
            <tr>
                <td>Télephone:</td>
                <td><input type=texte name=tel></td>
            </tr>

            <tr>
                <td colspan=2 align=center>
                    <input type=submit name=button1 value=Soumettre>
                </td>
            </tr>
        </table>"

?>
</body>
