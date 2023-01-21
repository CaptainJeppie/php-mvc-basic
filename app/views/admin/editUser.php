<?php
if ($_POST){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['password']) && isset($_POST['edit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $userId = $_POST['edit'];

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $this->loginService->editUser($userId ,$name, $email, $phoneNumber, $hashedpassword);
        header('Location: /admin/Users');
    }
}
$id = $_POST['edit'];
$model = $this->loginService->getById($id);

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
