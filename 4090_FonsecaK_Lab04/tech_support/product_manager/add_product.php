<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 11, 2024
  * Submitted date: February 1, 2024
  * Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
  */
  
// Get the product's data
$product_code = filter_input(INPUT_POST, 'code');
$product_name = filter_input(INPUT_POST, 'name');
$product_version = filter_input(INPUT_POST, 'version');
$product_release_date = filter_input(INPUT_POST, 'release_date');


// Validate inputs
if($product_code == NULL || $product_name == NULL || $product_version == NULL || $product_release_date == NULL) {
    $error = "Invalid product data. Check all fields and try again";
    include('../errors/error.php');
} else {
    require_once('../model/database.php');
    // require('../model/product_db.php');

    // Add new row to DB
    $query = "INSERT INTO products (productCode, name, version, releaseDate) VALUES (:code, :name, :version, :release_date)";
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $product_code);
    $statement->bindValue(':name', $product_name);
    $statement->bindValue(':version', $product_version);
    $statement->bindValue(':release_date', $product_release_date);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');    
}
?>