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
$cv = isset($_POST["cv"])? $_POST["cv"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$spe = isset($_POST["spe"])? $_POST["spe"] : "";

if (!empty($nom) && !empty($prenom) && !empty($cv) && !empty($photo) && !empty($spe) && !empty($mdp) && !empty($email)) {
    $sql = "SELECT * FROM agent WHERE email_Agent='$email' AND Prenom_Agent='$prenom' AND Nom_Agent='$nom'AND CV_Agent='$cv' AND Photo_Agent='$photo' AND Specialite_Agent='$spe'";
    $result = mysqli_query($db_handle, $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO agent (email_Agent, Prenom_Agent, Nom_Agent, MDP_Agent, CV_Agent, Photo_Agent, Specialite_Agent) VALUES ('$email', '$prenom', '$nom', '$mdp', '$cv', '$photo', '$spe')";
        $result = mysqli_query($db_handle, $sql);
        echo "Agent ajouté.";
    } else {
        echo "Cet agent existe déjà.";
    }
}

?>


</body>
