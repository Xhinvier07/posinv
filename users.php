<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Users | SARI</title>
    <meta name="description" content="Inventory &amp; Point of Sale System">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/Pricing-Centered-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include_once 'functions/authentication.php';
        include_once 'functions/sidebar.php';
        ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php include_once('navbar.php') ?>
                <?php
                    if (isset($_SESSION['flash_messages'])) {
                        foreach ($_SESSION['flash_messages'] as $message) {
                            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">' .
                                $message .
                                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
                                '</div>';
                        }
                        // Clear flash messages after displaying
                        unset($_SESSION['flash_messages']);
                    }
                ?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">User Management&nbsp;</h3>
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <?php
                                        // Connect to the database.
                                        $db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

                                        // Get the total number of users.
                                        $sql = "SELECT COUNT(*) FROM users";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch();
                                        $total_users = $row['COUNT(*)'];

                                        // Display the total number of users.
                                        echo "<div class=\"col me-2\">
                                                <div class=\"text-uppercase text-info fw-bold text-xs mb-1\"><span>total users</span></div>
                                                <div class=\"text-dark fw-bold h5 mb-0\"><span>$total_users</span></div>
                                                </div>";
                                        ?>
                                        <div class="col-auto"><i class="fa-solid fa-user fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <?php
                                        // Get the total number of cashiers.
                                        $sql = "SELECT COUNT(*) FROM users WHERE level = 1";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch();
                                        $total_cashiers = $row['COUNT(*)'];

                                        // Display the total number of cashiers.
                                        echo "<div class=\"col me-2\">
                                                <div class=\"text-uppercase text-success fw-bold text-xs mb-1\"><span>total cashiers</span></div>
                                                <div class=\"text-dark fw-bold h5 mb-0\"><span>$total_cashiers</span></div>
                                                </div>";
                                        ?>
                                        <div class="col-auto"><i class="fa-solid fa-cash-register fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <?php
                                        // Get the total number of admins.
                                        $sql = "SELECT COUNT(*) FROM users WHERE level = 0";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        $row = $stmt->fetch();
                                        $total_admins = $row['COUNT(*)'];

                                        // Display the total number of admins.
                                        echo "<div class=\"col me-2\">
                                                <div class=\"text-uppercase text-primary fw-bold text-xs mb-1\"><span>total admins</span></div>
                                                <div class=\"text-dark fw-bold h5 mb-0\"><span>$total_admins</span></div>
                                                </div>";
                                        ?>
                                        <div class="col-auto"><i class="fa-solid fa-user-shield fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0"></h3><button class="btn btn-primary btn-sm d-none d-sm-inline-block" type="button" data-bs-target="#add-user" data-bs-toggle="modal"><i class="fas fa-user fa-sm text-white-50"></i>&nbsp;Add Cashier</button>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Users List</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-bordered my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                           
                                            <th>Type</th>
                                            <th>Date Created</th>
                                            <th>User Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once 'functions/view-users.php'; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © SARI | POINT OF SALE AND INVENTORY MANAGEMENT SYSTEM</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add-user">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Cashier Account</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/create-account.php" method="post">
                    <div class="modal-body">
                        <h5 class="mb-4">Enter Account Details</h5>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="username" placeholder="Username" minlength="5" pattern="^(?!\s).*$" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Password" minlength="5" pattern="^(?!\s).*$" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Add Cashier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/update-account.php" method="post">
                    <div class="modal-body">
                        <h5 class="mb-4">Enter Account Details</h5>
                        <input type="hidden" name="userid">
                        <div class="mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Current Password" minlength="5" pattern="^(?!\s).*$" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="password" name="new_password" placeholder="New Password" minlength="5" pattern="^(?!\s).*$" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirmation">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this user?</p>
                </div>
                <form action="functions/remove-user.php" method="post">
                    <input type="hidden" name="userid">
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script>

        function validatePassword() {
            var new_password = document.getElementById("new_password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (new_password != confirm_password) {
                alert("Passwords do not match.");
                return false;
            }

            alert("Password changed successfully.");

            return true;
        }
        $('button[data-bs-target="#update"]').on('click', function() {
            // Get the user ID from the data attribute.
            var user_id = $(this).data('user-id');
            console.log(user_id);
            // Set the value of all input fields with the name "userid" to the user ID.
            $('input[name="userid"]').each(function() {
                $(this).val(user_id);
            });
        });

        $('button[data-bs-target="#confirmation"]').on('click', function() {
            // Get the user ID from the data attribute.
            var user_id = $(this).data('user-id');
            console.log(user_id);
            // Set the value of all input fields with the name "userid" to the user ID.
            $('input[name="userid"]').each(function() {
                $(this).val(user_id);
            });
        });

      


    </script>


    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel"><strong>Success!</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="modal-body-text">Cashier registered successfully! They may now login to their account.</p>
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