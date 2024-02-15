<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 10, 2024
  * Submitted date: February 14, 2024
  * Description: The purpose of this lab is to implement search and update functionality to the Be A Sport Technical Support application to allow technicians and managers to update existing customer information.
  */
include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Search</title>
	<link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<body>
<main>
	<h1>Customer Search</h1>

	<!-- Insert code necessary for the Label, Text Box, Button, and directing to the search_results.php page -->
	<!-- Added some attributes to make more user friendly. aka. added label and id to keyword input -->
	<form name="form1" method="post" action="search_results.php">
		<label for="keyword">Title:</label>
		<input type="text" name="keyword" id="keyword" placeholder="Type here..." />
		<button type="submit">Search</button>
	</form>
<main>
<body>
</html>
<?php include '../view/footer.php'; ?>
