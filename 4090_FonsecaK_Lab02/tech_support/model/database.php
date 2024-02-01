<?=
/*
* Name: Kevin Uriel Fonseca
* Student Id: 001070292
* Due date: February 11, 2024
* Submitted date: February 1, 2024
* Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
*/
?>
<?php
    $dsn = 'mysql:host=localhost;dbname=tech_support';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>