<?php
class HomeController
{

    public function index()
    {
        $this->ChooseHeader();

        require __DIR__ . '/../views/home/index.php';
    }

    public function about()
    {
        $this->ChooseHeader();

        require __DIR__ . '/../views/home/about.php';
    }

    /**
     * @return void
     */
    public function ChooseHeader(): void
    {
        if (isset($_SESSION['status']) && $_SESSION['status'] == 'loggedin') {
            include __DIR__ . '/../views/adminheader.php';
        } else {
            include __DIR__ . '/../views/header.php';
        }
    }
}