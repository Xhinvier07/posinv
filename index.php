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
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <style>
        html, body {
          overflow: hidden;
        }

        body {
            background-image: url("https://images.pexels.com/photos/2609107/pexels-photo-2609107.jpeg?cs=srgb&dl=pexels-dariuskrs-2609107.jpg&fm=jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .landing-page {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .landing-content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            border-radius: 1rem;
            backdrop-filter: blur(10px); /* Apply blur effect */
            background-color: rgba(255, 255, 255, 0.1); /* White-tinted glass effect */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            max-width: 900px;
        }

        .panel {
            padding: 2rem;
            text-align: center;
        }

        .panel h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .panel p {
            font-size: 1rem;
            line-height: 1.5;
        }

        .form-container {
            border-left: 1px solid #dee2e6;
            padding-left: 2rem;
        }
    </style>
</head>

<body>
    <div class="landing-page">
        <div class="landing-content">
            <div class="panel">
                <img src="assets/img/sari.png" alt="SARI Logo" class="mb-3" style="max-width: 200px;">
            </div>
            <div class="form-container">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4"><strong>Login</strong></h4>
                                    </div>
                                    <form class="user" action="functions/login.php" method="post">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <p class="text-danger">
                                            <?php 
                                              if (isset($_GET['error'])) {
                                                echo $_GET['error'];
                                              }
                                            ?>
                                        </p>
                                        
                                        <hr>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <div class="text-center mt-3">
                                            <a class="small" href="register.php">Create an Admin Account!</a>
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

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"><strong>Success!</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-body-text">Registered successfully! You may now login your account.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <section class="py-4 py-xl-5"></section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>

    <script>
        <?php if(isset($_GET['success']) && $_GET['success'] == '1'): ?>
        document.addEventListener('DOMContentLoaded', function() {
            // Show the success modal
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();

            // Trigger confetti
            confetti({
                particleCount: 100,
                spread: 70,
                origin: { y: 0.6 }
            });
        });
        <?php endif; ?>
    </script>
</body>

</html>