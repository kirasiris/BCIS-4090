<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 4, 2024
  * Submitted date: January 31, 2024
  * Description: The purpose of this lab is to look at the basics of a PHP program.
  */
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart</title>
<link href="lab1css.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Shopping Cart Intro</h1>
<?php if(!empty($error_message)) { ?>
  <p style="color: red; font-size: 10px"><?php echo htmlspecialchars($error_message) ?></p>
<?php } ?>
<form id="form1" name="form1" method="POST" action="fonseca_kevin_process_order.php">
  <p>
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName">
  </p>
  <p>
    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName">
  </p>
  <p>
    <label for="productName">Product Name:</label>
    <input type="text" name="productName" id="productName">
  </p>
  <p>
    <label for="quantity">Quantity:</label>
    <input type="text" name="quantity" id="quantity">
  </p>
  <p>
    <label for="price">Price:</label>
    <input type="text" name="price" id="price">
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    <input type="reset" name="reset" id="reset" value="Reset">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
