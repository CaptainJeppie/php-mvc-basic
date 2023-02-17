<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Edit User</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?= $model['name'] ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= $model['email'] ?>" required>
    <br>
    <label for="phoneNumber">Phone number:</label>
    <input type="text" name="phoneNumber" value="<?= $model['phoneNumber'] ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br><br>
    <input type="submit" name="edit" value="Edit User">
    <input type="hidden" id="id" name="edit" value="<?php echo $_POST['edit']?>">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
