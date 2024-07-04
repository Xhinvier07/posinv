<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Login | SARI</title>
    <meta name="description" content="SARI">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-xl-6 form-container">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login</h4>
                                    </div>
                                    <form class="user" action="functions/login.php" method="post">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <p style="color: darkred">
                                            <?php echo $_SESSION['error']; ?>
                                        </p>
                                        
                                        <hr>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <div class="text-center">
                                            <a class="small" href="register.php">Create an Account!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="py-4 py-xl-5"></section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
