<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>Inventory | SARI</title>
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
                    <h3 class="text-dark mb-4">Inventory Management</h3>
                    <div class="row">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                    <?php
                                            // Connect to the database.
                                            $db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

                                            // Get the total number of users.
                                            $sql = "SELECT COUNT(*) FROM products";
                                            $stmt = $db->prepare($sql);
                                            $stmt->execute();
                                            $row = $stmt->fetch();
                                            $total_products = $row['COUNT(*)'];

                                            // Display the total number of users.
                                            echo "<div class=\"col me-2\">
                                                    <div class=\"text-uppercase text-info fw-bold text-xs mb-1\"><span>total products</span></div>
                                                    <div class=\"text-dark fw-bold h5 mb-0\"><span>$total_products</span></div>
                                                </div>";

                                            ?>
                                        <div class="col-auto"><i class="fa-solid fa-cart-shopping fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3" style="display: flex; justify-content: space-between; align-items: center;">
                            <p class="text-primary m-0 fw-bold">Product List</p>
                            <button class="btn btn-primary btn-icon-split" type="button" data-bs-target="#add-product" data-bs-toggle="modal">
                                <span class="text-white-50 icon"><i class="fas fa-download"></i></span>
                                <span class="text-white text">Add Product</span>
                            </button>
                        </div>
                        <div class="card-body">
                            
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-hover table-bordered my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            
                                            <th style="white-space: nowrap;">Product ID</th>
                                            <th>Product Name</th>
                                            <th>Size</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Date Created</th>
                                            <th>Product Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once 'functions/view-products.php'; ?>
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

    <!-- Add Product Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="add-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/add-product.php" method="post">
                    <div class="modal-body">
                        <h5 class="mb-4">Enter Product Information</h5>
                        <div class="mb-3"><input class="form-control" type="text" pattern="^[\w](?!.*?\.{2})[\w.]{1,28}[\w]$" name="product_name" placeholder="Product Name" required></div>
                        <div class="mb-3"><input class="form-control" type="number" name="size" placeholder="Size" min=1 required></div>
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity" min=0 required></div>
                        <div class="mb-3"><input class="form-control" type="number" name="price" placeholder="Price" min=0 step=0.01 required></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Product Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="update-product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Product</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/update-product.php" method="post">
                    <div class="modal-body">
                        <h5 class="mb-4">Product Information</h5>
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="text" name="product_name" placeholder="Product Name"></div>
                        <div class="mb-3"><input class="form-control" type="number" name="size" placeholder="Size" min=1 required></div>
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity" min=0 required></div>
                        <div class="mb-3"><input class="form-control" type="number" name="price" placeholder="Price" min=0 step=0.01 required></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stock-In Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="stock-in">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Stock-In</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/stock-in.php" method="post">
                    <div class="modal-body">
                        <h5 class="mb-4">Product Information</h5>
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity" min=0 required></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Stock In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Stock-Out Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="stock-out">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Stock-Out</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <form action="functions/stock-out.php" method="post" onsubmit="return validateStockIn()">
                    <div class="modal-body">
                        <h5 class="mb-4">Product Information</h5>
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="number" name="qty" placeholder="Quantity" min=0 required></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Stock Out</button>
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
                <p>Are you sure you want to remove this product?</p>
                </div>
                <form action="functions/remove-product.php" method="post">
                <input type="hidden" name="product_id">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script>

        function validateStockOut() {
            var qty = document.querySelector('input[name="qty"]').value;
            var product_id = document.querySelector('input[name="product_id"]').value;

            // get the current quantity of the product
            var current_qty = document.querySelector(`input[name="current_qty_${product_id}"]`).value;

            if (parseInt(qty) > parseInt(current_qty)) {
                alert("Stock-out quantity exceeds available quantity.");
                return false;
            }

            return true;
        }
        
        $('button[data-bs-target="#stock-in"]').on('click', function() {
            // Get the user ID from the data attribute.
            var product_id = $(this).data('product-id');
            console.log(product_id);
            // Set the value of all input fields with the name "userid" to the user ID.
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });
        });

        $('button[data-bs-target="#stock-out"]').on('click', function() {

            // Get the user ID from the data attribute.
            var product_id = $(this).data('product-id');
            console.log(product_id);

            // Set the value of all input fields with the name "userid" to the user ID.
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });
        });

        $('button[data-bs-target="#update-product"]').on('click', function() {

            // Get the product ID from the data attribute.
            var product_id = $(this).data('product-id');
            var product_name = $(this).data('product-name');
            var size = $(this).data('size');
            var qty = $(this).data('qty');
            var price = $(this).data('price');

            console.log(product_id);
            console.log(product_name);
            console.log(size);
            console.log(qty);
            console.log(price);

            // Set the value of all input fields with the name "product_id" to the product ID.
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });

            // Set the value of all input fields with the name "product_name" to the product name.
            $('input[name="product_name"]').each(function() {
                $(this).val(product_name);
            });

            // Set the value of all input fields with the name "size" to the product size.
            $('input[name="size"]').each(function() {
                $(this).val(size);
            });

            // Set the value of all input fields with the name "qty" to the product qty.
            $('input[name="qty"]').each(function() {
                $(this).val(qty);
            });

            // Set the value of all input fields with the name "price" to the product price.
            $('input[name="price"]').each(function() {
                $(this).val(price);
            });
        });

        $('button[data-bs-target="#confirmation"]').on('click', function() {

            // Get the user ID from the data attribute.
            var product_id = $(this).data('product-id');
            console.log(product_id);

            // Set the value of all input fields with the name "userid" to the user ID.
            $('input[name="product_id"]').each(function() {
                $(this).val(product_id);
            });

        });
    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>