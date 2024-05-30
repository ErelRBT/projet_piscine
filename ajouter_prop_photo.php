<?php
// Démarrer la session
session_start();
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

$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$ID_prop =$email = isset($_SESSION['ID_prop']) ? $_SESSION['ID_prop'] : '';
if (!empty($photo)) {
    $sql = "INSERT INTO propriete (ID_Propriete, Prop_photo) VALUES ('$ID_prop', '$photo')";
    echo $ID_prop . $photo;
}

echo "<form action=ajouter_prop_photo.php method=post>
        <table border=1>
        <tr>
                <td>Photo:</td>
                <td><input type=text name=photo></td>
        </tr>
        <tr>
                <td colspan=2 align=center>
                    <input type=submit name=button1 value=Soumettre>
                </td>
        </tr>
        </table>
        </form>
        <br>
        <a href=connexion.php><input type=submit VALUE=HOME></a>";
?>
</body>
