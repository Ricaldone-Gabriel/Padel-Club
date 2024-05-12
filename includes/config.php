<?php
$connection = mysqli_connect("localhost", "username", "password", "padel_club");

if(!$connection) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}
?>
