<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 11, 2024
  * Submitted date: February 1, 2024
  * Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
  */
  
// Get the product's data
$technician_firstName = filter_input(INPUT_POST, 'first_name');
$technician_lastName = filter_input(INPUT_POST, 'last_name');
$technician_email = filter_input(INPUT_POST, 'email');
$technician_phone = filter_input(INPUT_POST, 'phone');
$technician_password = filter_input(INPUT_POST, 'password');


// Validate inputs
if($technician_firstName == NULL || $technician_lastName == NULL || $technician_email == NULL || $technician_phone == NULL || $technician_password == NULL) {
    $error = "Invalid technician data. Check all fields and try again";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');
    // require('../model/product_db.php');

    // Add new row to DB
    $query = "INSERT INTO technicians (firstName, lastName, email, phone, password) VALUES (:first_name, :last_name, :email, :phone, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $technician_firstName);
    $statement->bindValue(':last_name', $technician_lastName);
    $statement->bindValue(':email', $technician_email);
    $statement->bindValue(':phone', $technician_phone);
    $statement->bindValue(':password', $technician_password);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');    
}
?>