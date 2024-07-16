<?php
// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=db_hash', 'root', '');
$user_id = $_SESSION['id'];

// Get all data from the history table where status is not 'success'
$sql = 'SELECT * FROM history WHERE user_id = ' . $user_id . ' AND status != "success"';
$stmt = $db->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll();

// Check if the query returned any results
if (count($results) > 0) {
    // Loop through the results and add them to the table
    foreach ($results as $row) {
        ?>
        <tr>
            <td><img class="rounded-circle me-2" width="20" height="20" src="assets/img/item.png">&nbsp;<?php echo $row['product_id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['size']; ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <button class="btn btn-danger btn-sm" type="button" data-bs-target="#confirmation" data-bs-toggle="modal" data-history-id="<?php echo $row['id']; ?>" data-product-id="<?php echo $row['product_id']; ?>" data-qty="<?php echo $row['qty']; ?>">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php
    }
} else {
    // Display the instruction when the query returns no results
    ?>
    <tr>
        <td colspan="6" class="text-center text-muted small">Click the <i class="fas fa-plus-square text-primary"></i> icons in the products panel to add items to your cart.</td>
    </tr>
    <?php
}
?>