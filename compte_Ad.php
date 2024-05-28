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
        </form>
        <br>
        <br>";
    echo "<form action=ajouter_prop.php method=post>
        <table border=1>
        <tr>
                <td>Adresse:</td>
                <td><input type=text name=adresse></td>
            </tr>

            <tr>
                <td>Ville:</td>
                <td><input type=text name=ville></td>
            </tr>

            <tr>
                <td>Code postal:</td>
                <td><input type=text name=cp></td>
            </tr>

            <tr>
                <td>Pays:</td>
                <td><input type=password name=pays></td>
            </tr>
            
            <tr>
                <td>Description simple:</td>
                <td><input type=texte name=description></td>
            </tr>
            
            <tr>
                <td>Type:</td>
                <td><input type=number name=type></td>
            </tr>
            
            <tr>
                <td>Prix:</td>
                <td><input type=number name=prix></td>
            </tr>
            
            <tr>
                <td>Nobre de chambres:</td>
                <td><input type=number name=chambre></td>
            </tr>
            
            <tr>
                <td>Nombre de salle de bain:</td>
                <td><input type=number name=sdb></td>
            </tr>
            
            <tr>
                <td>Taille:</td>
                <td><input type=number name=taille></td>
            </tr>
            
            <tr>
                <td>Nombre de pièces:</td>
                <td><input type=number name=piece></td>
            </tr>
            
            <tr>
                <td>Nombre d'étages:</td>
                <td><input type=number name=etage></td>
            </tr>
            
            <tr>
                <td>Nombre de balcons:</td>
                <td><input type=number name=balcon></td>
            </tr>
            
            <tr>
                <td>Nombre de places de parking:</td>
                <td><input type=number name=parking></td>
            </tr>

            <tr>
                <td colspan=2 align=center>
                    <input type=submit name=button1 value=Soumettre>
                </td>
            </tr>
        </table>
        </form>
        <br><br>";


    echo "<form action=ajouter_prop.php method=post>
        <table border=1>
            <tr>
                <td>ID de la société à suprimer:</td>
                <td><input type=text name=ID></td>
            </tr>
            
            <tr>
                <td colspan=2 align=center>
                    <input type=submit name=button1 value=Soumettre>
                </td>
            </tr>
        </table>
        </form>";

}else{
    echo "Compte non existant";
}
?>
</body>
