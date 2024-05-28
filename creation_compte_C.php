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
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$mdp = isset($_POST["MDP"])? $_POST["MDP"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$cp = isset($_POST["CP"])? $_POST["CP"] : "";
$pays = isset($_POST["Pays"])? $_POST["Pays"] : "";
$tel = isset($_POST["tel"])? $_POST["tel"] : "";

if (!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($ville) && !empty($cp) && !empty($pays) && !empty($tel) && !empty($email) && !empty($mdp)) {
    $sql = "SELECT * FROM client WHERE email_Client='$email' AND Prenom_Client='$prenom' AND Nom_Client='$nom' AND Adresse_Client='$adresse' AND Ville_Client='$ville' AND CP_Client='$cp' AND Pays_Client='$pays' AND Tel_Client='$tel'";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO client (email_Client, Prenom_Client, Nom_Client, MDP_Client, Adresse_Client, Ville_Client, CP_Client, Pays_Client, Tel_Client) VALUES ('$email', '$prenom', '$nom', '$mdp', '$adresse', '$ville', '$cp', '$pays', '$tel')";
        $result = mysqli_query($db_handle, $sql);
        echo "Client ajouté.";
    } else {
        echo "Ce client existe déjà.";
    }
}

?>


</body>
