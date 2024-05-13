<?php
include ('includes/config.php');
include ('includes/functions.php');

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
    $hour = $_POST['hour'];
    $campo = $_POST['campo'];

    $query = "SELECT COUNT(*) AS num_prenotazioni FROM Prenotazione WHERE DataPrenotazione = '$hour' AND CodiceCampo = $campo";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $num_prenotazioni = $row['num_prenotazioni'];

    if ($num_prenotazioni < 4) {
        // Esegui la prenotazione nel database
        // ...
        echo "Prenotazione effettuata con successo!";
    } else {
        echo "Il campo è già pieno per quell'orario.";
    }
    book_slot($hour, $player1, $player2, $player3, $player4);
}

if (isset($_POST['add_player'])) {
    $booking_id = $_POST['booking_id'];
    $player_name = $_POST['player_name'];
    add_player_to_booking($booking_id, $player_name);
}
?>

<?php include ('partials/header.php') ?>
<?php include ('partials/navbarLogged.php') ?>

<body style="bodyBackground d-flex flex-column min-vh-100">

    <div class="container">
        <h2>Prenota un Campo</h2>
        <form action="dashboard.php" method="post">
            <label for="hour">Seleziona giorno e orario:</label>
            <input type="datetime-local" id="hour" name="hour" required>
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

</body>

<?php include ('partials/footer.php') ?>