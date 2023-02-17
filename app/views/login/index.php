<?php
include __DIR__ . '/../header.php'; ?>

<h1>login page!</h1>


<?php
?>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br><br>
    <input type="submit" name="login" value="Login">
</form>

<?php
include __DIR__ . '/../footer.php';
?>
