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

<main>	
    <h2>Get Customer</h2>	
    <p>You must enter the customer's email address to select the customer.</p>
    <!-- display a search form -->		 
	<form action="incident_form.php" method="post">
		<label>Email:</label><input type="text" name="email">
		<?php if (!empty($error)) { ?>
			<p class="error"><?php echo htmlspecialchars($error); ?></p>
		<?php } ?>
		<input type="submit" value="Get Customer">
	</form>
</main>

<?php include '../view/footer.php'; ?>
