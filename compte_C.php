<?php
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

$email = isset($_POST["email"])? $_POST["email"] : "";
$mdp = isset($_POST["MDP"])? $_POST["MDP"] : "";

$sql = "SELECT * FROM client WHERE email_Client = '$email' AND MDP_Client = '$mdp'";
$result = mysqli_query($db_handle, $sql);
if (mysqli_num_rows($result) == 1) {
    // Si les informations d'identification sont correctes, récupérez l'ID du client
    $row = mysqli_fetch_assoc($result);
    $id_client = $row['ID_Client'];

    echo "Bonjour ".$email.", votre ID est : ".$id_client;
    
    

}else{
    echo "Compte non existant";
}
?>
<form action=recherche.php method=post>
    <table border=1>
        <tr>
            <td>Recherche:</td>
            <td><input type=text name=recherche></td>
        </tr>
            <td colspan=2 align=center>
                <input type=submit name=button1 value=Rechercher>
            </td>
        </tr>
    </table>
</body>
