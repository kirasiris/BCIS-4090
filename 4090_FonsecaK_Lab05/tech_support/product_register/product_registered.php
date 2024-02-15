<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 24, 2024
  * Submitted date: February 14 2024
  * Description: The purpose of this lab is to build upon the Be A Sport Technical Support application to allow customers to register a product..
  */
include '../view/header.php';
require('../model/database.php');?>

<?php
// Declare necessary variables. There are three that are needed. Think about what values need to be stored.

/* INSERT CODE HERE */
$customerID = filter_input(INPUT_POST, "customerID", FILTER_VALIDATE_INT);
$productCode = filter_input(INPUT_POST, "productCode");
$registrationDate = date('Y-m-d');
// Query registrations table for duplicate record validation.

$query = "SELECT customerID, productCode FROM registrations WHERE customerID = :customerID AND productCode = :productCode";
$statement = $db->prepare($query);
$statement->bindValue(':customerID', $customerID);
$statement->bindValue(':productCode', $productCode);
$statement->execute();
$registration = $statement->fetch();
$statement->closeCursor();

/* 
	Validation for duplicate customer id and product code.
	
	Note:	The registrations table has a composite primary key of customerID and productCode so that an
			a matching entry will not be added to the registrations table. This validation simply tells the
			user that the production registration already exists, rather than just not adding it
*/
	
if ($registration) {
    $error = "Product registration already exists.";
    include_once('../errors/error.php');
    exit();
} else {
	// Query to insert customer id, product code, and registration date into the registrations table
	
	/* INSERT CODE HERE */	
    $query = "INSERT INTO registrations (customerID, productCode, registrationDate) VALUES (:customerID, :productCode, :registrationDate)";
    $statement = $db->prepare($query);
    $statement->bindValue(':customerID', $customerID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':registrationDate', $registrationDate);
    $statement->execute();
    $statement->closeCursor();
}

?>

<main>

    <h2>Register Product</h2>
    
	<p>
		<!--INSERT CODE HERE-->
		You have registered the product code, <?php echo htmlspecialchars($productCode); ?>
	</p>
</main>
<?php include '../view/footer.php'; ?>