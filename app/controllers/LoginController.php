<?php

require __DIR__ . '/../services/LoginService.php';

class LoginController
{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index()
    {
        $model = $this->loginService->getAll();

        require __DIR__ . '/../views/login/index.php';
    }
}