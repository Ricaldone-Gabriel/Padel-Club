<?php
if (!isset($_SESSION['Nome'])) {
    echo "<script>";
    echo "window.location.href = './';";
    echo "</script>";
}