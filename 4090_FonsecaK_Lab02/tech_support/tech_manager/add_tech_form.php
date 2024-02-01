<?=
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
    <h1>Add Technician</h1>
    <form action="add_tech.php" method="post" id="aligned">
        <label>First Name:</label>
        <input type="text" name="first_name"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name"><br>

        <label>Email:</label>
        <input type="text" name="email"><br>

        <label>Phone:</label>
        <input type="text" name="phone"><br>

        <label>Password:</label>
        <input type="text" name="password"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Technician"><br>
    </form>
    <p><a href="index.php">View Technician List</a></p>

</main>
<?php include '../view/footer.php'; ?>