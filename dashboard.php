<?php include('partials/navbarLogged.php') ?>
<?php include('includes/config.php') ?>
<?php include('includes/functions.php') ?>
<?php include('partials/header.php') ?>

<body class="bodyBackground d-flex flex-column min-vh-100">


    <div class="m-3 col-lg-4 col-xl-1 align-items-center order-1">
        <img src="images/User-Icon.jpg" class="img-fluid">
    </div>
    <div class="m-3 align-items-center">
        <h3 style="color: #494949">
            <i>Bentornato,</i>
            <class style="color: black; font-weight: bold"> <?php echo $_SESSION['Nome'] ?></class>

        </h3>
    </div>

    <?php
    $result = get_booking($_SESSION['Nome']);
    if ($result->num_rows > 0) {
    } else {
        echo "<div class='m-3 align-items-center'>";
        echo "Nessuna prenotazione effettuata";
        echo "</div>";
    }
    ?>


    <?php include('partials/footer.php') ?>