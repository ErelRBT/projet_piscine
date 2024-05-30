<?php
// identifier le nom de base de données
$database = "projet_piscine";

// connectez-vous dans votre BDD
// Rappel : votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

// Vérifier si les paramètres requis sont présents dans l'URL
if (isset($_GET['date']) && isset($_GET['heure'])) {
    $agent_id = 1; // ID de l'agent
    $client_id = 1; // ID du client
    $prop_id = 1; // ID de la propriété
    $date = $_GET['date'];
    $heure = $_GET['heure'];
    $datetime = $date . ' ' . $heure;

    // si le BDD existe, faire le traitement
    if ($db_found) {

            // Insérer le rendez-vous dans la base de données
            $sql_insert = "INSERT INTO rdv (ID_Agent, ID_Client, ID_Propriete, Datetime) VALUES ($agent_id, $client_id, $prop_id, '$datetime')";
            if (mysqli_query($db_handle, $sql_insert)) {
                echo "Rendez-vous pris avec succès!";
            } else {
                echo "Erreur: " . mysqli_error($db_handle);
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prendre un rendez-vous</title>
</head>
<body>
<h1>Prendre un rendez-vous</h1>
<p>Date et heure : <?php echo isset($datetime) ? date('d/m/Y H:i', strtotime($datetime)) : ""; ?></p>

</form>
</body>
</html>
