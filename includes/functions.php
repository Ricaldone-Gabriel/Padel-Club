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
function register_user($username, $password, $birth_date/*, $email*/)
{
    global $connection;
    session_unset();
    session_destroy();
    session_start();
    $query = "SELECT Nome FROM Socio WHERE Nome ='" . $username . "'";
    if (!$risultato = $connection->query($query)) {
        //Aggiungere redirect
    } else {
        if ($risultato->num_rows > 0) {
            //redirect al login
        } else {
            $query = "INSERT INTO Socio (Nome, DataNascita,Password) VALUES('" . $username . "','" . $birth_date . "','" . $password . "')";
            $connection->query($query);
            $_SESSION['Nome'] = $username;

            $query = "SELECT Nome, ID FROM Socio WHERE Nome ='" . $username . "' AND Password = '" . $password . "'";
            if (!$risultato = $connection->query($query)) {
                echo $query;
            } else {
                if ($risultato->num_rows > 0) {
                    foreach ($risultato as $record) {
                        $_SESSION['ID'] = $record['ID'];
                    }
                } else {
                    //redirect a login
                }
            }
        }
    }
}

function login_user($username, $password)
{
    global $connection;
    session_unset();
    session_destroy();
    session_start();
    $query = "SELECT Nome, ID FROM Socio WHERE Nome ='" . $username . "' AND Password = '" . $password . "'";
    if (!$risultato = $connection->query($query)) {
        echo $query;
    } else {
        if ($risultato->num_rows > 0) {
            foreach ($risultato as $record) {
                $_SESSION['Nome'] = $record['Nome'];
                $_SESSION['ID'] = $record['ID'];
            }
        } else {
            //redirect a login
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

function get_booking($player_name)
{
    global $connection;
    $query = "SELECT Nome, CodiceCampo, DataPrenotazione, OraPrenotazione FROM Socio, Prenotazione WHERE Nome ='" . $player_name . "' AND Socio.ID = Prenotazione.CodiceSocio ORDER BY DataPrenotazione, OraPrenotazione DESC";
    if (!$risultato = $connection->query($query)) {
        echo $query;
    } else {
        return $risultato;
    }
}
