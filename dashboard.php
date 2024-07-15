<?php
include 'functions/authentication.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Dashboard | SARI</title>
    <meta name="description" content="SARI">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/Pricing-Centered-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Centered-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
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
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                    <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Cashiers</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php include_once 'functions/dashboard-users.php'; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-cash-register fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Earnings (today)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>₱<?php include_once 'functions/dashboard-today-sales.php'; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-peso-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Earnings (monthly)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>₱<?php include_once 'functions/dashboard-month-sales.php'; ?></span></div>
                                            <div class="text-dark fw-bold h5 mb-0"></div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-peso-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Earnings (annually)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>₱<?php include_once 'functions/dashboard-year-sales.php'; ?></span></div>
                                            <div class="text-dark fw-bold h5 mb-0"></div>
                                        </div>
                                        <div class="col-auto"><i class="fa-solid fa-peso-sign fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="card-body">
                        <div class="chart-area">
                            <?php
                            include_once 'functions/dashboard-chart.php';
                            ?>
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>