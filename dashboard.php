<?php include('partials/header.php') ?>
<?php include('partials/navbarLogged.php') ?>
<?php include('includes/config.php') ?>
<?php include('includes/functions.php') ?>



<body>
    <div class="m-3 col-lg-2 col-xl-1 align-items-center order-1">
        <img src="images/User-Icon.jpg" class="img-fluid">
        <h4 style="color: #494949">
            <i>Ciao,</i>
            <div style="color: black; font-weight: bold"> <?php echo $_SESSION['Nome'] ?></div>
        </h4>
    </div>

</body>

<?php include('partials/footer.php') ?>