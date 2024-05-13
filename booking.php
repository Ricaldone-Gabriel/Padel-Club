<?php
include('./includes/config.php');
include('./includes/functions.php');

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
    $player1 = $_POST['player1'];
    $player2 = $_POST['player2'];
    $player3 = $_POST['player3'];
    $player4 = $_POST['player4'];
    book_slot($hour, $player1, $player2, $player3, $player4);
}

if (isset($_POST['add_player'])) {
    $booking_id = $_POST['booking_id'];
    $player_name = $_POST['player_name'];
    add_player_to_booking($booking_id, $player_name);
}
?>

<?php include('./partials/header.php') ?>

<body class="bodyBackground d-flex flex-column min-vh-100">
    <?php include('./partials/navbarLogged.php') ?>

    <div class="container">
        <h2>Prenota un Campo</h2>
        <form action="dashboard.php" method="post">
            <label for="hour">Seleziona l'orario:</label>
            <input type="datetime-local" id="hour" name="hour" required>

            <option id="option">
                <select id="1">
                    campo1
                </select>
            </option>

            <input type="submit" name="submit_booking" value="Prenota">
        </form>
    </div>

    <?php include('./partials/footer.php') ?>