<?php
session_start();
// identifier le nom de base de données
$database = "projet_piscine";

// connectez-vous dans votre BDD
// Rappel : votre serveur = localhost | votre login = root | votre mot de passe = '' (rien)
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$ID_desire = 1;
// si le BDD existe, faire le traitement
if ($db_found) {
    // Fonction pour obtenir les dates de la semaine en cours
    function getWeekDates($date) {
        $startOfWeek = strtotime('last Monday', strtotime($date));
        if (date('l', strtotime($date)) == 'Monday') {
            $startOfWeek = strtotime('this Monday', strtotime($date));
        }
        $endOfWeek = strtotime('next Sunday', $startOfWeek);
        $dates = [];
        for ($i = $startOfWeek; $i <= $endOfWeek; $i = strtotime('+1 day', $i)) {
            $dates[] = date('Y-m-d', $i);
        }
        return $dates;
    }

    // Déterminer la semaine à afficher en fonction de l'action sélectionnée
    $currentDate = isset($_GET['current_date']) ? $_GET['current_date'] : date('Y-m-d');
    if (isset($_GET['action']) && $_GET['action'] === 'prev') {
        $currentDate = date('Y-m-d', strtotime($currentDate . ' -7 days'));
    } elseif (isset($_GET['action']) && $_GET['action'] === 'next') {
        $currentDate = date('Y-m-d', strtotime($currentDate . ' +7 days'));
    }
    $currentWeekDates = getWeekDates($currentDate);

    // Récupérer les informations de l'agent avec ID = 1
    $sql_agent = "SELECT ID_Agent, Nom_Agent, Prenom_Agent FROM agent WHERE ID_Agent = $ID_desire";
    $result_agent = mysqli_query($db_handle, $sql_agent);
    $agent = mysqli_fetch_assoc($result_agent);

    if ($agent) {
        // Récupérer les rendez-vous pour la semaine sélectionnée pour l'agent avec ID = 1
        $sql_rdv_week = "SELECT ID_Agent, Datetime FROM rdv WHERE ID_Agent = $ID_desire AND DATE(Datetime) BETWEEN '" . $currentWeekDates[0] . "' AND '" . end($currentWeekDates) . "'";
        $result_rdv_week = mysqli_query($db_handle, $sql_rdv_week);

        $rendezvous_week = [];
        if (mysqli_num_rows($result_rdv_week) > 0) {
            while ($row = mysqli_fetch_assoc($result_rdv_week)) {
                $rendezvous_week[] = $row;
            }
        }
    } else {
        echo "Agent non trouvé.";
    }
    mysqli_close($db_handle);
} else {
    echo "Base de données non trouvée.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Emploi du temps de l'agent</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .rdv {
            background-color: grey;
            color: white;
        }
        .disponible {
            background-color: blue;
            color: white;
        }
    </style>
</head>
<body>
<h1>Emploi du temps de l'agent</h1>

<!-- Formulaire pour la navigation entre les semaines -->
<form method="get">
    <input type="hidden" name="current_date" value="<?php echo $currentDate; ?>">
    <button type="submit" name="action" value="prev">Semaine précédente</button>
    <button type="submit" name="action" value="next">Semaine suivante</button>
</form>

<?php if ($agent): ?>
    <h2><?php echo $agent['Nom_Agent'] . " " . $agent['Prenom_Agent']; ?></h2>
    <table>
        <tr>
            <th>Heure/Jour</th>
            <?php foreach ($currentWeekDates as $date): ?>
                <th><?php echo date('D d M', strtotime($date)); ?></th>
            <?php endforeach; ?>
        </tr>
        <?php for ($hour = 10; $hour < 17; $hour++):
            if ($hour == 13){
                $hour +=1;
            }?>
            <tr>
                <td><?php echo str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00'; ?></td>
                <?php foreach ($currentWeekDates as $date): ?>
                    <td class="
                        <?php
                    $heure_str = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00';
                    $heure_complete = $date . ' ' . $heure_str;
                    $rdv_pris = false;

                    // Vérifier si un rendez-vous est pris
                    foreach ($rendezvous_week as $rdv) {
                        if (date('Y-m-d H:00', strtotime($rdv['Datetime'])) == $heure_complete) {
                            $rdv_pris = true;
                            break;
                        }
                    }

                    echo $rdv_pris ? 'rdv' : 'disponible';
                    ?>
                    ">
                        <?php
                        if ($rdv_pris) {
                            echo "Rendez-vous";
                        } else {
                            echo "<a href='prendre_rdv.php?agent_id=1&date={$date}&heure={$heure_str}' style='color:white;'>Disponible</a>";
                        }
                        ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </table>
<?php else: ?>
    <p>Aucun agent trouvé.</p>
<?php endif; ?>
</body>
</html>
