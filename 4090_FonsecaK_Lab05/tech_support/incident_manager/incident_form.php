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
$email = filter_input(INPUT_POST, 'email');
$productCode = filter_input(INPUT_POST, 'productCode');

// set default value of title and description variables for initial page load for input validation
if (!isset($title)) { $title = ''; }
if (!isset($description)) { $description = ''; }

// Validation to check for blank email

if ($email == '')
{	
	$error = 'Email cannot be blank. Please enter a valid email.';
	//require_once('../errors/error.php');	
	require_once('index.php');
	exit();
}

/*
Query customers table to select customer id, first name, last name and email based on the email entered into the Text Box on the index.php file

Note:	This query will return a single record and the value of the email is passed to the register_form.php page using the
		Text Box name which is "email"
*/

$query1 = 'SELECT customerID, firstName, lastName, email FROM customers WHERE email = :email';
$statement1 = $db->prepare($query1);
$statement1->bindValue(':email', $email);
$statement1->execute();
$customer = $statement1->fetch();
$statement1->closeCursor();

// Validation to check that email exists

if (!$customer)
{
	$error = 'No matching email. Please enter a valid email.';
	//require_once('../errors/error.php');
	require_once('index.php');
	exit();
}

/*
	Query the customers, registrations, and products table to select the product code and product name from the products table for only the registered products for the selected customer's email.
	Order the results by the product code. This query is using the INNER JOIN to join three tables. See page 104, How to select data from multiple tables. Example code for joining three tables is provided.
	Especially notice the order in which the tables are joined.
	
	Note:	This query may return zero to many values representing all the products matching the customer's email. The drop-down list should display the product name, but pass the product code.
*/

/* INSERT CODE HERE FOR QUERY DESCRIBED ABOVE*/
$query2 = "SELECT products.productCode, products.name
		   FROM products
		   INNER JOIN registrations
		   		ON products.productCode = registrations.productCode
		   INNER JOIN customers
		   		ON registrations.customerID = customers.customerID
		   WHERE customers.email = :email";
$statement2 = $db->prepare($query2);
$statement2->bindValue(':email', $email);
$statement2->execute();
$products = $statement2->fetchAll();
$statement2->closeCursor();
?>

<main>
    <h2>Create Incident</h2>
    
        <p></p>    
        <form action="incident_added.php" method="post" id="aligned">            
            <input type="hidden" name="customerID" value="<?php echo $customer['customerID']; ?>">
			<input type="hidden" name="email" value="<?php echo $customer['email']; ?>">

            <label>Customer:</label><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?><br>

            <label>Product:</label>
            <select name="productCode">
				<!--INSERT CODE HERE TO POPULATE DROP-DOWN LIST WITH PRODUCT NAME AND CAPTURE PRODUCT CODE-->
				<?php foreach ($products as $p) : ?>
					<option value="<?php echo htmlspecialchars($p['productCode']); ?>"><?php echo htmlspecialchars($p['name']); ?></option>
				<?php endforeach; ?>
            </select> <br>
            <label>Title:</label>
			<input type="text" name="title" value="<?php echo htmlspecialchars($title);?>"><br>
			<!-- so that the user does not need to reenter valid title entry -->
			<label>Description:</label>
			<textarea id="description" name="description" rows="4" cols="50"><?php echo $description;?></textarea><br>
			<!-- so that the user does not need to reenter valid description entry -->	
			
			<?php if (!empty($error)) { ?>
				<p class="error"><?php echo htmlspecialchars($error); ?></p>
			<?php } ?>	
			
            <input type="submit" value="Create Incident" /><br>			
        </form>

</main>

<?php include '../view/footer.php'; ?>