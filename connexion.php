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

echo "<a href=sign_up.php><input type=submit VALUE=sign_up></a>";
echo "<a href=sign_in_C.php ><input type=submit VALUE=sign_in_Client></a>";
echo "<a href=sign_in_Ag.php ><input type=submit VALUE=sign_in_Agent></a>";
echo "<a href=sign_in_Ad.php ><input type=submit VALUE=sign_in_Admin></a>";
?>
</body>

