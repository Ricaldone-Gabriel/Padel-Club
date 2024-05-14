<?php include('includes/config.php') ?>
<?php include('includes/functions.php') ?>
<?php

if (isset($_POST['submit_registration'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birth_date = $_POST['birth-date'];
    //$email = $_POST['email'];
    register_user($username, $password, $birth_date /*, $email*/);
}

if (isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login_user($username, $password);
}

include('partials/navbar.php') ?>
<?php include('partials/header.php') ?>


<body class="bodyBackground d-flex flex-column min-vh-100">
    <div class="row d-flex justify-content-center mt-4" style="width:100%">
        <div class="col-md-6 m-0">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="images/User-Icon.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title" style="color: #494949"> <i>Bentornato,</i>
                                <class style="color: black; font-weight: bold"> <?php echo $_SESSION['Nome'] ?></class>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <?php
                    $result = get_booking($_SESSION['Nome']);

                    if ($result->num_rows > 0) {
                        echo "<div class='gradient-custom-1 h-100'>";
                        echo "<div class='mask d-flex align-items-center h-100'>";
                        echo "<div class='container'>";
                        echo "<div class='row justify-content-center'>";
                        echo "<div class='col-12'>";
                        echo "<div class='table-responsive bg-white'>";
                        echo "<h3><caption>Prenotazioni campi</caption></h3>";
                        echo "<table class='table'>";
                        echo "<thead><tr><th scope='col'>Utente</th><th scope='col'>Campo</th><th scope='col'>Data</th><th scope='col'>Ora</th><th scope='col'>Soci</th></thead><tbody>";

                        while ($row = $result->fetch_assoc()) {

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
                                echo "<th scope='row' style='color: #00B613;'>" . $row['Nome'] . "</th>";
                                echo "<td style='color: #00B613;'>" . $row['CodiceCampo'] . "</td>";
                                echo "<td style='color: #00B613;'>" . $row['DataPrenotazione'] . "</td>";
                                echo "<td style='color: #00B613;'>" . $row['OraPrenotazione'] . "</td>";
                                echo "<td style='color: #A09F9F;'>" . $row_numero_soci['numero_soci'] . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<th scope='row' style='color: #A09F9F;'> " . $row['Nome'] . "</th>";
                                echo "<td style='color: #A09F9F;'>" . $row['CodiceCampo'] . "</td>";
                                echo "<td style='color: #A09F9F;'>" . $row['DataPrenotazione'] . "</td>";
                                echo "<td style='color: #A09F9F;'>" . $row['OraPrenotazione'] . "</td>";
                                echo "<td style='color: #A09F9F;'>" . $row_numero_soci['numero_soci'] . "</td>";
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
                        echo "Nessuna prenotazione effettuata";
                        echo "</div>";
                    }
                    ?>
                </div>
                <div class="row d-flex justify-content-center mb-3">
                    <button type="button" class="btn btn-outline-danger" style="width:50%">Log out</button>
                </div>
            </div>
        </div>
    </div>




    <?php include('partials/footer.php') ?>