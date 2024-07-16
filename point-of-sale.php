<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/48.png">
    <title>POS | SARI</title>
    <meta name="description" content="Inventory &amp; Point of Sale System">
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
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center p-4">
                                    <h6 class="text-uppercase text-muted card-subtitle">TOTAL</h6>
                                    <h4 class="display-4 fw-bold card-title">₱<?php include_once 'functions/pos-total.php'; ?></h4>
                                    <form class="text-center mt-3" method="post">
                                        <button class="btn btn-primary" type="button" data-bs-target="#purchase" data-bs-toggle="modal" disabled>Purchase</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Cart Items</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th style="white-space: nowrap;">Code (ID)</th>
                                                    <th>Product Name</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'functions/pos-history.php';
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow h-100">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Products</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                        <table class="table table-hover table-bordered my-0" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th style="white-space: nowrap;">Code (ID)</th>
                                                    <th>Product Name</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include_once 'functions/pos-view-products.php';
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="purchase">
    <div class="modal-dialog" role="document">
        <form action="functions/pos-transaction.php" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Point of Sale</h4>
                    <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center mb-4">Purchase Confirmation</h5>
                    <div class="card">
                        <div class="card-body text-center p-4">
                            <h6 class="text-uppercase text-muted card-subtitle">TOTAL</h6>
                            <h4 class="display-4 fw-bold card-title mb-4">₱<?php include 'functions/pos-total.php'; ?></h4>
                            
                            <div class="mb-3">
                                <input class="form-control" type="number" id="discount" name="discount" min="0" placeholder="Enter amount to be discounted">
                            </div>
                            
                            <div class="mb-3">
                                <input class="form-control" type="number" id="amount" name="amount" min="0" placeholder="Enter amount received" required>
                            </div>
                            
                            <input type="hidden" name="total_sales" value="<?php include 'functions/pos-total.php'; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    .card-body {
        display: block;
    }
</style>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirmation">
        <div class="modal-dialog" role="document">
            <form action="functions/pos-remove-history.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to remove this product?</p>
                        <input type="hidden" name="history_id">
                        <input type="hidden" name="product_id">
                        <input type="hidden" name="product_qty">

                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add-item">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Quantity</p>
                    <form id="add-item-form" class="text-center" action="functions/pos-add-item.php" method="post">
                        <input type="hidden" name="product_id">
                        <div class="mb-3"><input class="form-control" type="number" id="item_qty" name="item_qty" value="1" placeholder="1" min=1 required></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" form="add-item-form">Add Item</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script>

        //#purchase button
        $(document).ready(function(){
            // initially disable the purchase button
            $('button[data-bs-target="#purchase"]').prop('disabled', true);
            // check if there is a product in the cart by checking if there is remove button
            if ($('button[data-bs-target="#confirmation"]').length) {
                // enable the purchase button
                $('button[data-bs-target="#purchase"]').prop('disabled', false);
            }else{
                // disable the purchase button
                $('button[data-bs-target="#purchase"]').prop('disabled', true);
            }
           
        })

    
        $('button[data-bs-target="#add-item"]').on('click', function() {
            // Get product ID and available quantity from data attributes
            var product_id = $(this).data('product-id');
            var max_qty = $(this).data('product-qty');

            // Set the product ID in the hidden input field
            $('input[name="product_id"]').val(product_id);

            // Store max_qty in a data attribute for validation later
            $('#item_qty').data('max-qty', max_qty);
        });

        // Validate quantity before form submission
        $('#add-item form').on('submit', function(e) {
            var entered_qty = parseInt($('#item_qty').val());
            var max_qty = parseInt($('#item_qty').data('max-qty'));

            if (entered_qty > max_qty) {
                alert('Quantity exceeds the available stock.');
                e.preventDefault(); // Prevent form submission
            } 
        });

        $('button[data-bs-target="#confirmation"]').on('click', function() {
        // Get the user ID from the data attribute.
        var product_id = $(this).data('product-id');
        var history_id = $(this).data('history-id');
        var qty = $(this).data('qty');
        

        console.log(product_id);
        // Set the value of all input fields with the name "userid" to the user ID.
        $('input[name="history_id"]').each(function() {
            $(this).val(history_id);
        });

        $('input[name="product_id"]').each(function() {
            $(this).val(product_id);
        });


        $('input[name="product_qty"]').each(function() {
            $(this).val(qty);
        });
        });
    </script>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>