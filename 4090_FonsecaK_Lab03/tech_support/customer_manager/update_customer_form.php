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
        $action = 'update_customer_form';
    }
}

if ($action == '../update_customer_form') {
    include('../update_customer_form.php');
}

// Insert PHP code to assign a value to a PHP variable representing customer ID
// Apply FILTER_VALIDATE_INT
$customerID = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);

// Insert PHP code for the SQL query to select the fields from the customers table based upon the customer ID
// and other required PHP code
$query = "SELECT * FROM customers WHERE customerID = :customerID";
$statement = $db->prepare($query);
$statement->bindValue(":customerID", $customerID);
$statement->execute();
$title = $statement->fetch();
$statement->closeCursor();

?>
<!DOCTYPE html>
<html>
<head>
	<title>View/Update Customer</title>
	<link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<body>
<main>
	<h1>View/Update Customer</h1>	
	
	<!-- Insert the PHP code and HTML to generate the display of the update_customer_form.php page based upon the customer ID -->
    <form id="form1" name="form1" method="post" action="update_customer.php">
        <table>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="firstName" value="<?php echo htmlspecialchars($title['firstName'] ??= 'Not firstName') ?>" /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lastName" value="<?php echo htmlspecialchars($title['lastName'] ??= 'Not lastName') ?>" /></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value="<?php echo htmlspecialchars($title['address'] ??= 'Not address') ?>" /></td>
            </tr>
            <tr>
                <td>City:</td>
                <td><input type="text" name="city" value="<?php echo htmlspecialchars($title['city'] ??= 'Not city') ?>" /></td>
            </tr>
            <tr>
                <td>State:</td>
                <td><input type="text" name="state" value="<?php echo htmlspecialchars($title['state'] ??= 'Not state') ?>" /></td>
            </tr>
            <tr>
                <td>Postal Code:</td>
                <td><input type="text" name="postalCode" value="<?php echo htmlspecialchars($title['postalCode'] ??= 'Not postalCode') ?>" /></td>
            </tr>
            <tr>
                <td>Country Code:</td>
                <td><input type="text" name="countryCode" value="<?php echo htmlspecialchars($title['countryCode'] ??= 'Not countryCode') ?>" /></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" value="<?php echo htmlspecialchars($title['phone'] ??= 'Not phone') ?>" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" value="<?php echo htmlspecialchars($title['email'] ??= 'Not email') ?>" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" value="<?php echo htmlspecialchars($title['password'] ??= 'Not password') ?>" /></td>
            </tr>            
            <tr>
                <td><input type="hidden" name="customerID" value="<?php echo $title['customerID'] ??= 'Not customerID'; ?>"></td>
                <td><button type="submit">Update</button></td>
            </tr>
        </table>      
    </form>
	<p><a href="index.php">Search Customers</a></p>
<main>
<body>
</html>
<?php include '../view/footer.php'; ?>