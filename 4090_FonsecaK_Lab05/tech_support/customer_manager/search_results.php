<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 10, 2024
  * Submitted date: February 14, 2024
  * Description: The purpose of this lab is to implement search and update functionality to the Be A Sport Technical Support application to allow technicians and managers to update existing customer information.
  */

include '../view/header.php';
require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'search_results'; 
    }
}
if ($action == '../search_results') { 
    include('../search_results.php'); 
}

// Insert code to assign the search term from the index.php page to a PHP variable
$searchInput = filter_input(INPUT_POST, 'keyword');

// Insert code for the SQL query and other required PHP statements to get selected fields from customers table based upon the search term
$query = "SELECT customerID, firstName, lastName, address, city FROM customers WHERE firstName = :keyword";
$statement = $db->prepare($query);
$statement->bindValue(":keyword", $searchInput);
$statement->execute();
$titles = $statement->fetchAll();
$statement->closeCursor();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Search</title>
	<link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<body>
<main>
	<h1>Results</h1>	

	<table>
		<tr>
			<th>Name</th>
			<th>Email address</th>
			<th>City</th>		
		</tr>
			<!-- Insert PHP code and HTML to display the results of the query in the table -->
			<?php foreach ($titles as $title) : ?>
		<tr>
			<td><?php echo $title['firstName'] . ' ' . $title['lastName'] ?></td>
			<td><?php echo $title['address']; ?></td>
			<td><?php echo $title['city']; ?></td>
			<td>
				<form action="update_customer_form.php" method="post">
					<input type="hidden" name="customer_id" value="<?php echo $title['customerID']; ?>">
					<button type="submit">Select</button>
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<main>
<body>
</html>
<?php include '../view/footer.php'; ?>