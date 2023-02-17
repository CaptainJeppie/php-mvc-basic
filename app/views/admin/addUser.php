<?php
include __DIR__ . '/../adminheader.php';
?>

<h2>Add User</h2>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="phoneNumber">Phone number:</label>
    <input type="text" name="phoneNumber" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br><br>
    <input type="submit" name="add" value="Add User">
</form>


<?php
include __DIR__ . '/../footer.php';
?>
