<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');

// Get all data from the products table
$sql = 'SELECT * FROM products ORDER BY created DESC';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

// Loop through the results and add them to the table
foreach ($results as $row) {
?>
    <tr>
        <td>
            <?php
                if (date('Y-m-d', strtotime($row['created'])) == date('Y-m-d')) {
                    echo '<img class="rounded-circle me-2" width="20" height="20" src="assets/img/new.png">&nbsp;' . $row['id'];
                } else {
                    echo '<img class="rounded-circle me-2" width="20" height="20" src="assets/img/item.png">&nbsp;' . $row['id'];
                }
            ?>
        </td>
       
        
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><?php echo $row['qty']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['created']; ?></td>
        <td>
            <button class="btn btn-success btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#stock-in" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white-50 icon"><i class="fas fa-arrow-up"></i></span><span class="text-white text">Stock In</span></button>
            <button class="btn btn-info btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#stock-out" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white-50 icon"><i class="fas fa-arrow-down"></i></span><span class="text-white text">Stock Out</span></button>
            <button class="btn btn-warning btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#update-product" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>" data-product-name="<?php echo htmlspecialchars($row['product_name']); ?>" data-qty="<?php echo $row['qty']; ?>" data-price="<?php echo $row['price']; ?>" data-size="<?php echo $row['size']; ?>"><span class="text-white-50 icon"><i class="fas fa-exclamation-triangle"></i></span><span class="text-white text">Update</span></button>
            <button class="btn btn-danger btn-icon-split" type="button" style="margin: 2px;" data-bs-target="#confirmation" data-bs-toggle="modal" data-product-id="<?php echo $row['id']; ?>"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Remove</span></button>
        </td>
    </tr>
<?php
}

?>