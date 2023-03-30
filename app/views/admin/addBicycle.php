<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Add Bicycle</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br>
    <label for="category">Category:</label>
    <input type="text" name="category" required>
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" required>
    <br>
    <label for="picture">Picture link:</label>
    <input type="text" name="picture" required>
    <br>
    <label for="borg">Deposit:</label>
    <input type="text" name="borg" required>
    <br>
    <label for="priceperday">Price per day:</label>
    <input type="text" name="priceperday" required>
    <br>
    <br>
    <input type="submit" name="add" value="Add Bicycle">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
