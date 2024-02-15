<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: April 21, 2024
  * Submitted date: February 15, 2024
  * Description: The purpose of this lab is  to build upon the Be A Sport Technical Support application to allow admin users to: (1) select a customer’s country from a drop-down list and update the countryCode field in the customers table, and (2) select the customer’s gender from a group of radio buttons and update the gender field in the customers table.
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
$gender = filter_input(INPUT_POST, 'gender'); // From Lab 6
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postalCode = filter_input(INPUT_POST, 'postalCode');
$countryCode = filter_input(INPUT_POST, 'countryCode');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// Insert the PHP code for the SQL query and other required PHP statements to update the fields in the customer table
$query1 =    "UPDATE customers SET
                firstName = :firstName,
                lastName = :lastName,
                gender = :gender,
                address = :address,
                city = :city,
                state = :state,
                postalCode = :postalCode,
                countryCode = :countryCode,
                phone = :phone,
                email = :email,
                password = :password
            WHERE customerID = :customerID";
$statement=$db->prepare($query1);
$statement->bindValue(':customerID', $customerID);
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':gender', $gender); // From lab 6
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

/// THIS IS NOT NECESSARY. THIS IS TOTALLY ADDED BY ME
$query2 = "SELECT * FROM customers WHERE customerID = :customerID";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":customerID", $customerID);
$statement2->execute();
$statement2->fetch();
$statement2->closeCursor();

include('update_customer_form.php');
?>