<?php include('../partials/header.php') ?>

<body>
    <form action="home.php" method="POST">
        <section style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Accesso</p>
                                        <form class="mx-1 mx-md-4" id="loginForm">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <input type="text" id="name" name="username" class="form-control" required />
                                                    <label class="form-label" for="name">Nome</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <input type="password" id="password" name="password" class="form-control" required />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" name="submit_login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Accedi</button>
                                            </div>

                                            <div class="d-flex justify-content-center mt-3">
                                                <p class="text-muted">Non sei registrato? <a href="register.php" class="text-primary">Registrati</a></p>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-6 d-flex align-items-center order-1 order-lg-2">
                                        <img src="../images/padel_image.png" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>