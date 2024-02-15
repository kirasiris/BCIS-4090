<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 24, 2024
  * Submitted date: February 14 2024
  * Description: The purpose of this lab is to build upon the Be A Sport Technical Support application to allow customers to register a product..
  */
include '../view/header.php'; ?>
<?php require('../model/database.php');?>

<?php

// Declare necessary variables. There are three that are needed. Think about what values need to be stored.
// That line above is a lie, there's no more variables and the video itself does not ask for the password input (i skipped it as well);
/* INSERT CODE HERE */
$email = filter_input(INPUT_POST, "email");

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

/* INSERT CODE HERE */
$query = "SELECT customerID, firstName, lastName, email FROM customers WHERE email = :email";
$statement = $db->prepare($query);
$statement->bindValue(":email", $email);
$statement->execute();
$customer = $statement->fetch();
$statement->closeCursor();

// Validation to check that email exists
if (!$customer)
{
	$error = 'No matching email. Please enter a valid email.';
	//require_once('../errors/error.php');
	require_once('index.php');
	exit();
}

/*
	Query products table to select product code ordered by product code for populating List Box
	
	Note:	This query will return multiple values representing all the product code values
*/

/* INSERT CODE HERE */
$productsQuery = "SELECT productCode FROM products ORDER BY productCode";
$productsStatement = $db->prepare($productsQuery);
$productsStatement->execute();
$products = $productsStatement->fetchAll();
$productsStatement->closeCursor();
?>

<main>
    <h2>Register Product</h2>
    
        <p></p>    
        <form action="product_registered.php" method="post" id="aligned">            
            <input type="hidden" name="customerID"
				value="<?php echo $customer['customerID']; ?>">		

            <label>Customer:</label>
			<!--INSERT CODE HERE-->
            <label><?php echo $customer['firstName'] . ' ' . $customer['lastName']; ?></label>
            <br>

            <label>Product:</label>
            <select name="productCode">
				<!--INSERT CODE HERE-->
				<?php foreach ($products as $title) : ?>
					<option value="<?php echo htmlspecialchars($title['productCode']); ?>"><?php echo htmlspecialchars($title['productCode']); ?></option>
				<?php endforeach; ?>
			</select>
			<br>
            <label>&nbsp;</label>			
            <input type="submit" value="Register Product" /><br>			
        </form>

</main>

<?php include '../view/footer.php'; ?>