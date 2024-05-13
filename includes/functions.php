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
function register_user($username, $password/*, $email*/)
{
    global $connection;
    $query = "SELECT Nome FROM Socio WHERE Nome ='" . $username . "'";
    if (!$risultato = $connection->query($query)) {
        echo $query;
    } else {
        if ($risultato->num_rows > 0) {
            //redirect al login
        } else {
            $query = "INSERT INTO Socio (Nome, DataNascita ,Password) VALUES('" . $username . "','" . "01-01-2024" . "','" . $password . "')";
            $connection->query($query);
            login_user($username, $password);
        }
    }
}

function login_user($username, $password)
{
    global $connection;
    $query = "SELECT Nome, ID FROM Socio WHERE Nome ='" . $username . "' AND Password = '" . $password . "'";
    if (!$risultato = $connection->query($query)) {
        echo $query;
    } else {
        if ($risultato->num_rows > 0) {
            foreach ($risultato as $record) {
                $_SESSION['Nome'] = $record['Nome'];
                $_SESSION['ID'] = $record['ID'];
            }
        }
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
