<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: April 14, 2024
  * Submitted date: February 15 2024
  * Description: The purpose of this lab is to build upon the Be A Sport Technical Support application to admin users to enter new incidents by writing the necessary PHP code
  */
include_once '../view/header.php'; ?>
<?php require('../model/database.php');?>

<?php

// Variable Declarations
$customerID = filter_input(INPUT_POST, 'customerID');
$productCode = filter_input(INPUT_POST, 'productCode');
$dateOpened = date('Y-m-d');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');

// Validation of title and description not blank

if ($title == FALSE)
{
	$error = 'Title cannot be blank. Please enter a title.';
}
else if ($description == FALSE)
{
	$error = 'Description cannot be blank. Please enter a description.';
}
else
{
	$error = '';
}

// if an error message exists, reload the incident_form page

if ( $error != '')
{
	require_once('incident_form.php');
	exit();
}

/*	Query to insert incident id, customer id, product code, date opened, title, and description into the incidents table

	Note: At this point, values do not need to be inserted for tech id and date closed fields.
*/

/* INSERT CODE HERE FOR QUERY DESCRIBED ABOVE */
$query3 = "INSERT INTO incidents (customerID, productCode, dateOpened, title, description) VALUES (:customerID, :productCode, :dateOpened, :title, :description)";
$statement3 = $db->prepare($query3);
$statement3->bindValue(':customerID', $customerID);
$statement3->bindValue(':productCode', $productCode);
$statement3->bindValue(':dateOpened', $dateOpened);
$statement3->bindValue(':title', $title);
$statement3->bindValue(':description', $description);
$statement3->execute();
$statement3->closeCursor();

?>

<main>

    <h2>Create Incident</h2>
    
	<p><?php echo htmlspecialchars('This incident was added to our database.'); ?></p>

</main>
<?php include '../view/footer.php'; ?>