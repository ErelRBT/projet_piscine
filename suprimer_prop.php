<?php
//identifier le nom de base de données
$database = "projet_piscine";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
//si le BDD existe, faire le traitement

$ID = isset($_POST["ID"])? $_POST["ID"] : "";


// Vérifier si l'ID n'est pas vide
if (!empty($ID)) {
    // Vérifier si l'ID existe dans la table
    $sql_check = "SELECT * FROM propriete WHERE ID = $ID";
    $result_check = mysqli_query($db_handle, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $sql = "DELETE FROM propriete WHERE ID = $ID";
        $result = mysqli_query($db_handle, $sql);
        echo "Propriété supprimé";
    }else{echo "Propriété innexistante";}
}