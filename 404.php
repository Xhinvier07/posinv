<!DOCTYPE html>
<html lang="en">

<!-- 
Hello Jc

-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Page Not Found | SARI</title>
    <meta name="description" content="SARI">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="page-top">
    <div class="container-fluid">
        <div class="text-center mt-5">
            <div class="error mx-auto" data-text="404">
                <p class="m-0">404</p>
            </div>
            <p class="text-dark mb-5 lead"><?php echo $_GET["error"]?></p>
            <p class="text-black-50 mb-0"><?php echo $_GET["message"]?></p>
            <a href="./dashboard.php">← Back to Dashboard</a>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>