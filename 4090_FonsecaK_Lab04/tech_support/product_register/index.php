<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: March 24, 2024
  * Submitted date: February 14 2024
  * Description: The purpose of this lab is to build upon the Be A Sport Technical Support application to allow customers to register a product..
  */
include_once '../view/header.php'; ?>
<?php require('../model/database.php');?>

<main>
	<h2>Customer Login</h2>
	<p>You must login before you can register a product.</p>
	<!-- display a search form -->
	<form action="register_form.php" method="post">
		<label>Email:</label><input type="text" name="email">
		<?php if (!empty($error)) { ?>
			<p class="error"><?php echo htmlspecialchars($error); ?></p>
		<?php } ?>
		<input type="submit" value="Login">
	</form>
</main>

<?php include '../view/footer.php'; ?>
