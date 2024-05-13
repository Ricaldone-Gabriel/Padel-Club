<?php
if (isset($_session['Nome'])) {
    echo " <nav class='navbar navbar-expand-lg bg-body-tertiary'> ";
    echo " <div class='container-fluid'> ";
    echo " <a class='navbar-brand' href='index.php'> ";
    echo " <img src='./images/LogoPadel.png' alt='Logo' width='35' class='d-inline-block align-text-top'>";
    echo " <b>Padel Club</b>";
    echo " </a>";
    echo " <div class='collapse navbar-collapse' id='navbarSupportedContent'>";
    echo " <ul class='navbar-nav ms-auto align-items-center'>";
    echo " <li class='nav-item'>";
    echo " <a class='nav-link mx-2' href='./booking.php'><i class='fas fa-plus-circle pe-2'></i>Booking</a>";
    echo " </li>";
    echo " <li class='nav-item ms-3'>";
    echo " <a class='btn btn-outline-dark btn-rounded' href='./dashboard.php'>Dashboard</a>";
    echo " </li>";
    echo " </ul>";
    echo " </div>";
    echo " </div>";
    echo " </nav>";
} else {
    echo "<div class='container-fluid'>";
    echo "<a class='navbar-brand' href='index.php'>";
    echo "<img src='./images/LogoPadel.png' alt='Logo' width='35' class='d-inline-block align-text-top'>";
    echo "<b>Padel Club</b>";
    echo "</a>";
    echo "<div class='collapse navbar-collapse' id='navbarSupportedContent'>";
    echo "<ul class='navbar-nav ms-auto align-items-center'>";
    echo "<li class='nav-item ms-3'>";
    echo "<a class='btn btn-black btn-rounded' href='./pages/login.php'>Login</a>";
    echo "</li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
}
