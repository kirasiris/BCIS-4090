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

// Fetch technicians from DB
$techniciansQuery = "SELECT * FROM technicians ORDER BY firstName";
$techniciansStatement = $db->prepare($techniciansQuery);
$techniciansStatement->execute();
$technicians = $techniciansStatement->fetchAll();
$techniciansStatement->closeCursor();

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
    <h1>Technician List</h1>

    <!-- display a table of technicians -->
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
            <td><?php echo htmlspecialchars($technician['lastName']); ?></td>
            <td><?php echo htmlspecialchars($technician['email']); ?></td>
            <td><?php echo htmlspecialchars($technician['phone']); ?></td>
            <td><?php echo htmlspecialchars($technician['password']); ?></td>
            <td>
                <form action="delete_tech.php" method="post">
                    <input type="hidden" name="technician_id" value="<?php echo $technician['techID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="add_tech_form.php">Add Technician</a></p>    
</main>
<?php include '../view/footer.php'; ?>