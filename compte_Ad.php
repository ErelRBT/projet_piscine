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

$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["MDP"])? $_POST["MDP"] : "";

$sql = "SELECT * FROM admin WHERE email_Admin = '$email' AND MDP_Admin = '$mdp'";
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) == 1) {
    echo "<form action=creation_compte_Ag.php method=post>
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
                <td>CV:</td>
                <td><input type=texte name=cv></td>
            </tr>
            
            <tr>
                <td>Photo:</td>
                <td><input type=texte name=photo></td>
            </tr>
            
            <tr>
                <td>Spécialité de l'agent:</td>
                <td><input type=texte name=spe></td>
            </tr>

            <tr>
                <td colspan=2 align=center>
                    <input type=submit name=button1 value=Soumettre>
                </td>
            </tr>
        </table>
        </form>";
    echo "Ajouter propriété ". $email;
    echo "Supprimer propriété". $email;
}else{
    echo "Compte non existant";
}
?>
</body>
