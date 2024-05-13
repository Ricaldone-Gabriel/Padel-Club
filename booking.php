<?php
include ('./includes/config.php');
include ('./includes/functions.php');

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

        // Inserisci i dati nella tabella Prenotazione
        $insert_query = "INSERT INTO Prenotazione (CodiceSocio, CodiceCampo, DataPrenotazione, OraPrenotazione) VALUES ($codice_socio, '$campo', '$data_prenotazione', '$ora_prenotazione')";
        $insert_result = mysqli_query($connection, $insert_query);

        if ($insert_result) {
            echo "Prenotazione effettuata con successo!";
        } else {
            echo "Si è verificato un errore durante la prenotazione: " . mysqli_error($connection);
        }
    } else {
        echo "Il campo è già pieno per quell'orario.";
    }
}
?>

<?php include ('./partials/header.php') ?>

<body class="bodyBackground d-flex flex-column min-vh-100">
    <?php include ('./partials/navbarLogged.php') ?>

    <div class="container">
        <h2>Prenota un Campo</h2>
        <form   method="post"> <!-- action="dashboard.php" -->
            <label for="date">Seleziona la data:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Seleziona l'orario:</label>
            <input type="time" id="time" name="time" required>
            <br>

            <label for="campo">Seleziona il campo:</label>
            <select id="campo" name="campo">
                <option value="1">Campo 1</option>
                <option value="2">Campo 2</option>
                <option value="3">Campo 3</option>
                <option value="4">Campo 4</option>
            </select>

            <input type="submit" name="submit_booking" value="Prenota">
        </form>
    </div>

    <?php include ('./partials/footer.php') ?>