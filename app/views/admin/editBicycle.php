<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Edit Bicycle</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= $model['name'] ?>" required>
    <br>
    <label for="availability">Availability:</label>
    <input type="number" name="availability" value="<?= $model['isAvailable'] ?>" required>
    <br>
    <label for="category">Category:</label>
    <input type="text" name="category" value="<?= $model['category'] ?>" required>
    <br>
    <label for="description">Description:</label>
    <input type="text" name="description" value="<?= $model['description'] ?>" required>
    <br>
    <label for="picture">Picture link:</label>
    <input type="text" name="picture" value="<?= $model['picture'] ?>" required>
    <br>
    <label for="borg">Deposit:</label>
    <input type="text" name="borg" value="<?= $model['borg'] ?>" required>
    <br>
    <label for="priceperday">Price per day:</label>
    <input type="text" name="priceperday" value="<?= $model['priceperday'] ?>" required>
    <br>
    <br>
    <input type="submit" name="add" value="Edit Bicycle">
    <input type="hidden" id="id" name="edit" value="<?= $model['id'] ?>">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
