<?php

/*
if ($mysqli->connect_errno) {
   echo "non si connette: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_POST["Impegna"])) {
   $query = "INSERT INTO chiamate (ID_Tassisti,Destinazione) VALUES (" . $_POST["IDTassista"] . ",'" . $_POST["Destinazione"] . "')";
   if (!$risultato = $mysqli->query($query)) {
      echo $query;
   }
   $query = "UPDATE tassisti SET Impegnato = (SELECT ID_Chiamate FROM chiamate WHERE ID_Tassisti =" . $_POST["IDTassista"] . ") WHERE ID_Tassisti = " . $_POST["IDTassista"];
   if (!$risultato = $mysqli->query($query)) {
      echo $query;
   }
}
*/
echo "Funziona1!";
function register_user($username, $password, $birth_date/*, $email*/)
{
    global $connection;
    $query = "SELECT Nome FROM Socio WHERE Nome ='" . $username . "'";
    if (!$result = $connection->query($query)) {
        //Aggiungere redirect
    } else {
        $query = "INSERT INTO Socio (Nome, DataNascita ,Password) VALUES('" . $username . "','" . $birth_date . "','" . $password . "')";
        $connection->query($query);
        $_SESSION['username'] = $username;
    }
}

function login_user($username, $password)
{
    global $connection;
    $query = "SELECT Nome FROM Socio WHERE Nome ='" . $username . "' AND Password = '" . $password . "'";
    if (!$result = $connection->query($query)) {
        $_SESSION['username'] = $username;
    } else {
        //Aggiungere redirect
    }
}

function book_slot($hour, $player1, $player2, $player3, $player4)
{
    global $connection;
}

function add_player_to_booking($booking_id, $player_name)
{
    global $connection;
}
