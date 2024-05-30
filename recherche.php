<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Résultats de la recherche</title>
</head>
<body>
<?php
//identifier le nom de base de données
$database = "projet_piscine";
//connectez-vous dans votre BDD
//Rappel : votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);
//si la BDD existe, effectuer le traitement

$recherche = isset($_POST["recherche"])? $_POST["recherche"] : "";

$sql = "SELECT * FROM agent WHERE ID_Agent LIKE '%$recherche%' OR email_Agent LIKE '%$recherche%' OR Prenom_Agent LIKE '%$recherche%' OR Nom_Agent LIKE '%$recherche%' OR CV_Agent LIKE '%$recherche%' OR Photo_Agent LIKE '%$recherche%' OR Specialite_Agent LIKE '%$recherche%'";

$result = mysqli_query($db_handle, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h2>Résultats de la recherche :</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Email</th><th>Prénom</th><th>Nom</th><th>CV</th><th>Photo</th><th>Spécialité</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID_Agent'] . "</td>";
        echo "<td>" . $row['email_Agent'] . "</td>";
        echo "<td>" . $row['Prenom_Agent'] . "</td>";
        echo "<td>" . $row['Nom_Agent'] . "</td>";
        echo "<td>" . $row['CV_Agent'] . "</td>";
        echo "<td>" . $row['Photo_Agent'] . "</td>";
        echo "<td>" . $row['Specialite_Agent'] . "</td>";
    }
}
$sql = "SELECT * FROM admin WHERE ID_Admin LIKE '%$recherche%' OR email_Admin LIKE '%$recherche%' OR Prenom_Admin LIKE '%$recherche%' OR Nom_Admin LIKE '%$recherche%' OR CV_Admin LIKE '%$recherche%' OR Photo_Admin LIKE '%$recherche%' OR Specialite_Admin LIKE '%$recherche%'";

$result = mysqli_query($db_handle, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<tr><th>ID</th><th>Email</th><th>Prénom</th><th>Nom</th><th>CV</th><th>Photo</th><th>Spécialité</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<td>" . $row['ID_Admin'] . "</td>";
        echo "<td>" . $row['email_Admin'] . "</td>";
        echo "<td>" . $row['Prenom_Admin'] . "</td>";
        echo "<td>" . $row['Nom_Admin'] . "</td>";
        echo "<td>" . $row['CV_Admin'] . "</td>";
        echo "<td>" . $row['Photo_Admin'] . "</td>";
        echo "<td>" . $row['Specialite_Admin'] . "</td>";
        echo "</tr>";
    }
}

$sql = "SELECT * FROM propriete WHERE ID_Propriete LIKE '%$recherche%' OR Adresse_Propriete LIKE '%$recherche%' OR Ville_Propriete LIKE '%$recherche%' OR CP_Propriete LIKE '%$recherche%' OR Pays_Propriete LIKE '%$recherche%' OR Description_Propriete LIKE '%$recherche%' OR Types_Propriete LIKE '%$recherche%' OR Prix_Propriete LIKE '%$recherche%' OR Prix_Propriete LIKE '%$recherche%' OR Chambre_Propriete LIKE '%$recherche%' OR SDB_Propriete LIKE '%$recherche%' OR Taille_Propriete LIKE '%$recherche%' OR Pieces_Propriete LIKE '%$recherche%' OR Etage_Propriete LIKE '%$recherche%' OR Balcon_Propriete LIKE '%$recherche%' OR Parking_Propriete LIKE '%$recherche%'";

$result = mysqli_query($db_handle, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<tr><th>ID</th><th>Photo</th><th>Adresse</th><th>Ville</th><th>Pays</th><th>Types</th><th>Prix</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        $sql_photo = "SELECT Prop_photo FROM prop_photo WHERE ID_Propriete='".$row['ID_Propriete']."' LIMIT 1";
        $result_photo = mysqli_query($db_handle, $sql_photo);
        $row_photo = mysqli_fetch_assoc($result_photo);
        echo "<tr>";
        echo "<td>" . $row['ID_Propriete'] . "</td>";
        echo "<td>" . $row_photo['Prop_photo'] . "</td>";
        echo "<td>" . $row['Adresse_Propriete'] . "</td>";
        echo "<td>" . $row['Ville_Propriete'] . "</td>";
        echo "<td>" . $row['Pays_Propriete'] . "</td>";
        echo "<td>" . $row['Types_Propriete'] . "</td>";
        echo "<td>" . $row['Prix_Propriete'] . "</td>";
        echo "</tr>";
    }
}
    echo "</table>";


// Fermer la connexion
mysqli_close($db_handle);
?>
</body>
</html>
