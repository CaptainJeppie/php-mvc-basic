<?php

require __DIR__ . '/../services/LoginService.php';

class logincontroller
{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index()
    {
        $model = $this->loginService->getAll();

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

        require __DIR__ . '/../views/login/index.php';
    }

}