<?php
//identifier le nom de base de données
$database = "projet_piscine";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement



if ($db_found) {
    $sql = "INSERT INTO admin (email_Admin, Prenom_Admin, Nom_Admin, MDP_Admin, CV_Admin, Photo_Admin, Specialite_Admin) VALUES ('erel.rebot@edu.ece.fr', 'Erel', 'Rebot', 'Password', 'cv_erel.png', 'erel.png', 'Back-end')";
    $result = mysqli_query($db_handle, $sql);
}

?>