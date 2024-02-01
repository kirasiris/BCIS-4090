<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 4, 2024
  * Submitted date: January 31, 2024
  * Description: The purpose of this lab is to look at the basics of a PHP program.
  */
  /* get data from the form using POST method */
  $first_name = filter_input(INPUT_POST,"firstName");
  $last_name = filter_input(INPUT_POST, "lastName");
  $product_name = filter_input(INPUT_POST, "productName");
  $quantity = filter_input(INPUT_POST, "quantity", FILTER_VALIDATE_INT);
  $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT);
  $shipping = 0;

  // define constants
  define('TAX_RATE', .0825);

  // validate the date and set error message
  if(empty($first_name)){
    $error_message = "First name must be completed";
  } else if(empty($last_name)) {
    $error_message = "Last name must be completed";
  } else if(empty($product_name)) {
    $error_message = "Product name must be completed";
  } else if($quantity == FALSE) {
    $error_message = "Quantity must be an integer";
  } else if ($price == FALSE) {
    $error_message = "Price must be a decimal";
  } else {
    $error_message = "";
  };

  if($error_message != "") {
    include('fonseca_kevin_cart.php');
    exit();
  }

  // Do calculations
  $subtotal = $price * $quantity;
  $tax = $subtotal * TAX_RATE;
  $receipt_total = $subtotal+$tax;

  if($receipt_total <= 25){
    $shipping = 8;
  } else if($receipt_total <= 50){
    $shipping = 4;
  }

  $order_total = $receipt_total + $shipping;

  // Format output
  $fullName = $first_name .' '. $last_name;
  $date = date('m/d/y');
  $subtotal_f = '$'.number_format($subtotal, 2);
  $tax_f = '$'.number_format($tax, 2);
  $shipping_f = '$'.number_format($shipping, 2);
  $total_f = '$'.number_format($order_total, 2)
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Process Order</title>
<link href="lab1css.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Order Information</h1>
<form id="form1" name="form1" method="">
  <p style="font-family:arial; font-weight:bold">Name: <?php echo htmlspecialchars($fullName) ?></p>
  <p style="font-family:arial; font-weight:bold">Date of Order: <?php echo htmlspecialchars($date) ?></p>
  <p style="font-family:arial; font-weight:bold">Product Ordered: <?php echo htmlspecialchars($product_name) ?></p>
  <p style="font-family:arial; font-weight:bold">Quantity Ordered: <?php echo htmlspecialchars($quantity) ?></p>
  <p style="font-family:arial; font-weight:bold">Subtotal: <?php echo htmlspecialchars($subtotal_f) ?></p>
  <p style="font-family:arial; font-weight:bold">Tax: <?php echo htmlspecialchars($tax_f) ?></p>
  <p style="font-family:arial; font-weight:bold">Shipping: <?php echo htmlspecialchars($shipping_f) ?></p>
  <p style="font-family:arial; font-weight:bold">Total Due: <?php echo htmlspecialchars($total_f) ?></p>
</form>
<p>&nbsp;</p>
</body>
</html>
