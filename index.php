<?php
//include('includes/config.php');
include('includes/functions.php');

if(isset($_POST['submit_registration'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    register_user($username, $password, $email);
}

if(isset($_POST['submit_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login_user($username, $password);
}

if(isset($_POST['submit_booking'])) {
    $hour = $_POST['hour'];
    $player1 = $_POST['player1'];
    $player2 = $_POST['player2'];
    $player3 = $_POST['player3'];
    $player4 = $_POST['player4'];
    book_slot($hour, $player1, $player2, $player3, $player4);
}

if(isset($_POST['add_player'])) {
    $booking_id = $_POST['booking_id'];
    $player_name = $_POST['player_name'];
    add_player_to_booking($booking_id, $player_name);
}

include('partials/header.php');?>

<body>
    <?php include('partials/navbar.php');?>
</body>

<?php
include('partials/footer.php');
//idea, faccio copia e incolla e faccio il commit

//mi ha fatto creare un mio repository
?>