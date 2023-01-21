<?php
if ($_POST){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $this->loginService->addUser($name, $email, $phoneNumber, $hashedpassword);
        header('Location: /admin/Users');
    }
}

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
