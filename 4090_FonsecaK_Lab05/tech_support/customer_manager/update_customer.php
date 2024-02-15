<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 10, 2024
  * Submitted date: February 14, 2024
  * Description: The purpose of this lab is to implement search and update functionality to the Be A Sport Technical Support application to allow technicians and managers to update existing customer information.
  */
require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'update_customer';
    }
}

if ($action == '../update_customer') {
    include('../update_customer.php');
}

// Insert PHP code to assign values which represent each field in the customer table to a PHP variable
// which are passed from the update_customer_form.php page
// Include the FILTER_VALIDATE_ constant where appropriate (hint: review the data types of each field)
$customerID = filter_input(INPUT_POST, 'customerID', FILTER_VALIDATE_INT);
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postalCode = filter_input(INPUT_POST, 'postalCode');
$countryCode = filter_input(INPUT_POST, 'countryCode');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Insert the PHP code for the SQL query and other required PHP statements to update the fields in the customer table
$query =    "UPDATE customers SET
                firstName = :firstName,
                lastName = :lastName,
                address = :address,
                city = :city,
                state = :state,
                postalCode = :postalCode,
                countryCode = :countryCode,
                phone = :phone,
                email = :email,
                password = :password
            WHERE customerID = :customerID";
$statement=$db->prepare($query);
$statement->bindValue(':customerID', $customerID);
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':address', $address);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':postalCode', $postalCode);
$statement->bindValue(':countryCode', $countryCode);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $password);
$success=$statement->execute();
$statement->closeCursor();

include('update_customer_form.php');
?>