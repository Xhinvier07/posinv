<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Register | SARI</title>
    <meta name="description" content="SARI">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div style="max-width:500px;" class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-xl-6 form-container" style="padding: 10px;">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Admin Account!</h4>
                            </div>
                            <form class="user" action="functions/register.php" method="post">
                                <div class="mb-3">
                                    <input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username"
                                    
                                    
                                    <?php // if username was already inputted, it gets retained
                                          if (isset($_GET['username'])) {
                                            echo 'value="' . $_GET['username'] . '"';
                                          }
                                    ?>
                                        
                                    >
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat">
                                    </div>

                                    <!-- if there is an error with the password, display it here -->
                                    <?php if (isset($_GET['pw_error0'])) { ?>
                                        <p class="text-danger"><?php 
                                        
                                        for ($i = 0; $i <= 10; $i++) {
                                            if (!isset($_GET['pw_error' . $i])) {
                                                break;
                                            }

                                            echo $_GET['pw_error' . $i] . '<br>';
                                        }
                                            
                                        ?></p>
                                    <?php } ?>

                                </div>
                                <button class="btn btn-primary d-block btn-user w-100" type="submit">Register Account</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
