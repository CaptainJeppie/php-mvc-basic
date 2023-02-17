<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Edit Rental</h2>

<form method="post">
    <label for="bikeId">Bike Id:</label>
    <input type="text" name="bikeId" value="<?= $model['bicycleId'] ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $model['email'] ?>" required>
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" name="startDate" value="<?= $model['startDate'] ?>" required>
    <br>
    <label for="endDate">End Date:</label>
    <input type="date" name="endDate" value="<?= $model['endDate'] ?>" required>
    <br>
    <label for="price">Price:</label>
    <input type="text" name="price" value="<?= $model['price'] ?>" required>
    <br>
    <br>
    <input type="submit" name="edit" value="Edit Rental">
    <input type="hidden" id="id" name="edit" value="<?php echo $_POST['edit']?>">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
