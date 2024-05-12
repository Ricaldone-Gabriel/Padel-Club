<?php
$connection = mysqli_connect("localhost", "root", "", "padel_club");
session_start();
if (!$connection) {
    die("Errore di connessione al database: " . mysqli_connect_error());
}
