<?php
include('./includes/config.php');
include('./includes/functions.php');
$prenotazioneB = 2;

if (isset($_POST['submit_booking'])) {
    $data_prenotazione = $_POST['date'];
    $ora_prenotazione = $_POST['time'];
    $campo = $_POST['campo'];

    $query = "SELECT COUNT(*) AS num_prenotazioni FROM Prenotazione WHERE DataPrenotazione = '$data_prenotazione $ora_prenotazione' AND CodiceCampo = $campo";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    $num_prenotazioni = $row['num_prenotazioni'];

    if ($num_prenotazioni < 4) {
        $codice_socio = $_SESSION['ID'];
        $insert_query = "INSERT INTO Prenotazione (CodiceSocio, CodiceCampo, DataPrenotazione, OraPrenotazione) VALUES ($codice_socio, '$campo', '$data_prenotazione', '$ora_prenotazione')";
        $insert_result = mysqli_query($connection, $insert_query);

        if ($insert_result) {
            $prenotazioneB = 1;
        } else {
            $prenotazioneB = 0;
        }
    } else {
        echo "Il campo è già pieno per quell'orario.";
    }
}
?>

<?php include('./partials/header.php') ?>
<?php include('partials/redirect.php') ?>

<body class="bodyBackground d-flex flex-column min-vh-100">
    <?php include ('./partials/navbar.php') ?>

    <div class="container">
        <h2>Prenota un Campo</h2>
        <form method="post">
            <!-- action="dashboard.php" -->
            <label for="date">Seleziona la data:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Seleziona l'orario:</label>
            <input type="time" id="time" name="time" min="08:00" max="22:00" step="1800" required list="orari">
            <datalist id="orari">
                <?php
                for ($hour = 8; $hour <= 22; $hour++) {
                    $time = sprintf("%02d:%02d", $hour, $hour);
                    echo "<option value=\"$time\"></option>";
                }
                ?>
            </datalist>
            <br>

            <label for="campo">Seleziona il campo:</label>
            <select id="campo" name="campo">
                <?php
                $query = "SELECT ID FROM Campo";
                $result = mysqli_query($connection, $query);

                foreach ($result as $record) {
                    echo "<option value='" . $record['ID'] . "'>Campo " . $record['ID'] . " </option>";
                }
                ?>
            </select>

            <input type="submit" name="submit_booking" value="Prenota">
        </form>
        <?php
        if ($prenotazioneB == 0) {
            echo "Errore nella prenotazione.";
        } else if ($prenotazioneB == 1) {
            echo "Il campo è stato prenotato con successo.";
        }

        ?>
        <div class="row g-0">
            <?php
            echo $_SESSION['ID'];
            $query = "SELECT P.CodiceSocio, P.CodiceCampo, P.DataPrenotazione, P.OraPrenotazione
            FROM Prenotazione P
            WHERE P.CodiceSocio != '" . $_SESSION['ID'] . "'
            ORDER BY P.DataPrenotazione DESC, P.OraPrenotazione DESC";
            $risultato = $connection->query($query);

            if ($risultato->num_rows > 0) {
                echo "<div class='gradient-custom-1 h-100'>";
                echo "<div class='mask d-flex align-items-center h-100'>";
                echo "<div class='container'>";
                echo "<div class='row justify-content-center'>";
                echo "<div class='col-12'>";
                echo "<div class='table-responsive bg-white'>";
                echo "<h3><caption>Prenotazioni campi</caption></h3>";
                echo "<table class='table'>";
                echo "<thead><tr><th scope='col'>ID Utente</th><th scope='col'>Campo</th><th scope='col'>Data</th><th scope='col'>Ora</th><th scope='col'>Soci</th></thead><tbody>";

                while ($row = $risultato->fetch_assoc()) {

                    $query_numero_soci = "SELECT COUNT(S.ID) AS numero_soci
                      FROM Prenotazione P
                      JOIN Socio S ON P.CodiceSocio = S.ID
                      JOIN Campo C ON P.CodiceCampo = C.ID
                      WHERE P.DataPrenotazione = '" . $row['DataPrenotazione'] . "' 
                      AND P.OraPrenotazione = '" . $row['OraPrenotazione'] . "' 
                      AND C.ID = '" . $row['CodiceCampo'] . "'";

                    if ($result_numero_soci = $connection->query($query_numero_soci)) {
                        $row_numero_soci = $result_numero_soci->fetch_assoc();
                    } else {
                        //errore
                    }

                    if (strtotime($row['DataPrenotazione'] . ' ' . $row['OraPrenotazione']) > time()) {
                        echo "<tr>";
                        echo "<td>" . $row['CodiceSocio'] . "</td>";
                        echo "<td>" . $row['CodiceCampo'] . "</td>";
                        echo "<td>" . $row['DataPrenotazione'] . "</td>";
                        echo "<td>" . $row['OraPrenotazione'] . "</td>";
                        echo "<td>" . $row_numero_soci['numero_soci'] . "</td>";
                        echo "</tr>";
                    }
                }

                echo "</tbody></table>";

                // Fine della tabella HTML
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='m-3 align-items-center'>";
                echo "Gli altri soci non hanno effettuato prenotazioni";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <?php include ('./partials/footer.php') ?>