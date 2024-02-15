<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 11, 2024
  * Submitted date: February 1, 2024
  * Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
  */
  
require('../model/database.php');
// require('../model/product_db.php');

// Fetch products from DB
$productsQuery = "SELECT * FROM products ORDER BY name";
$productsStatement = $db->prepare($productsQuery);
$productsStatement->execute();
$products = $productsStatement->fetchAll();
$productsStatement->closeCursor();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'index';
    }
}

if ($action == '../index') {
    include('../index.php');
}

?>
<?php include '../view/header.php'; ?>
<main>
<h1>Product List</h1>

<!-- display a table of products -->
<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Version</th>
        <th>Release Date</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($products as $product) :
        $ts = strtotime($product['releaseDate']);
        $release_date_formatted = date('n/j/Y', $ts);
    ?>
    <tr>
        <td><?php echo htmlspecialchars($product['productCode']); ?></td>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td><?php echo htmlspecialchars($product['version']); ?></td>
        <td><?php echo $release_date_formatted; ?></td>
        <td>
            <form action="delete_product.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                <input type="submit" value="Delete">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<p><a href="add_product_form.php">Add Product</a></p>    
</main>
<?php include '../view/footer.php'; ?>