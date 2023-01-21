<?php
if ($_POST) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loginService = new LoginService();
        if($loginService->chekUser($email, $password)){
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 'loggedin';
            header('Location: /admin/index');
        }
        else{
            header('Location: /login/index');
        }
    }
}
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
