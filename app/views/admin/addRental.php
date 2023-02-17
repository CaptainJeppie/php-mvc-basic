<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Add Rental</h2>

<form method="post">
    <label for="bikeId">Bike Id:</label>
    <input type="text" name="bikeId" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" name="startDate" required>
    <br>
    <label for="endDate">End Date:</label>
    <input type="date" name="endDate" required>
    <br>
    <label for="price">Price:</label>
    <input type="text" name="price" required>
    <br>
    <br>
    <input type="submit" name="add" value="Add Rental">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
