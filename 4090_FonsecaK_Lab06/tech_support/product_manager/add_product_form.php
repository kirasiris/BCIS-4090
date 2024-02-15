<?php
  /*
  * Name: Kevin Uriel Fonseca
  * Student Id: 001070292
  * Due date: February 11, 2024
  * Submitted date: February 1, 2024
  * Description: The purpose of this lab is to expand the Be A Sport Technical Support application to allow for retrieving and adding products and technicians.
  */
?>
<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="add_product.php" method="post" id="aligned">
        <label>Code:</label>
        <input type="text" name="code"><br>

        <label>Name:</label>
        <input type="text" name="name"><br>

        <label>Version:</label>
        <input type="text" name="version"><br>

        <label>Release Date:</label>
        <input type="text" name="release_date">
        <label class="message">Use any valid date format</label><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product"><br>
    </form>
    <p><a href="index.php">View Product List</a></p>

</main>
<?php include '../view/footer.php'; ?>