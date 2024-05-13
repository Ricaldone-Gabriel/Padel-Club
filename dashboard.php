<?php include('partials/navbarLogged.php') ?>
<?php include('includes/config.php') ?>
<?php include('includes/functions.php') ?>
<?php include('partials/header.php') ?>

<body class="bodyBackground d-flex flex-column min-vh-100">


    <div class="m-3 col-lg-4 col-xl-1 align-items-center order-1">
        <img src="images/User-Icon.jpg" class="img-fluid">
    </div>
    <div class="m-3 align-items-center">
        <h3 style="color: #494949">
            <i>Bentornato,</i>
            <class style="color: black; font-weight: bold"> <?php echo $_SESSION['Nome'] ?></class>

        </h3>
    </div>

    <?php
    $result = get_booking($_SESSION['Nome']);

    if ($result->num_rows > 0) {
        echo "<section class='intro'>";


        echo "<div class='gradient-custom-1 h-100'>";
        echo "<div class='mask d-flex align-items-center h-100'>";
        echo "<div class='container'>";
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-12'>";
        echo "<div class='table-responsive bg-white'>";
        echo "<caption>Prenotazioni campi</caption>";
        echo "<table class='table'>";
        echo "<thead><tr><th scope='col'>Utente</th><th scope='col'>Campo</th><th scope='col'>Data</th><th scope='col'>Ora</th></thead><tbody>";

        while ($row = $result->fetch_assoc()) {

            if (strtotime($row['DataPrenotazione'] . ' ' . $row['OraPrenotazione']) > time()) {
                echo "<tr>";
                echo "<th scope='row' style='color: #00B613;'>" . $row['Nome'] . "</th>";
                echo "<td style='color: #00B613;'>" . $row['CodiceCampo'] . "</td>";
                echo "<td style='color: #00B613;'>" . $row['DataPrenotazione'] . "</td>";
                echo "<td style='color: #00B613;'>" . $row['OraPrenotazione'] . "</td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<th scope='row' style='color: #A09F9F;'> " . $row['Nome'] . "</th>";
                echo "<td style='color: #A09F9F;'>" . $row['CodiceCampo'] . "</td>";
                echo "<td style='color: #A09F9F;'>" . $row['DataPrenotazione'] . "</td>";
                echo "<td style='color: #A09F9F;'>" . $row['OraPrenotazione'] . "</td>";
                echo "</tr>";
            }
        }

        echo "</tbody></table>";

        // Fine della tabella HTML
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='m-3 align-items-center'>";
        echo "Nessuna prenotazione effettuata";
        echo "</div>";
    }
    ?>


    <?php include('partials/footer.php') ?>