<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 11, 2024
  * Submitted date: February 1, 2024
  * Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
  */
require_once('../model/database.php');

// Get IDs
$technician_id = filter_input(INPUT_POST, 'technician_id', FILTER_VALIDATE_INT);

// Execute DB delete query
if($technician_id != FALSE){
    $query = "DELETE FROM technicians WHERE techID = :technician_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':technician_id', $technician_id);
    $success = $statement->execute();
    $statement->closeCursor();
}
// Display the Technician List page
include('index.php');