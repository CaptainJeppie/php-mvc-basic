<?php
include __DIR__ . '/../services/CatalogueService.php';
include __DIR__ . '/../services/LoginService.php';
include __DIR__ . '/../services/RentalService.php';

class admincontroller
{
    private $catalogueService;
    private $loginService;
    private $rentalService;

    function __construct()
    {
        $this->catalogueService = new CatalogueService();
        $this->loginService = new LoginService();
        $this->rentalService = new RentalService();
    }

    public function index()
    {
        require __DIR__ . '/../views/admin/index.php';
    }

    public function Users()
    {
        $model = $this->loginService->getAll();

        require __DIR__ . '/../views/admin/users.php';
    }

    public function Bicycles()
    {
        $model = $this->catalogueService->getAll();

        require __DIR__ . '/../views/admin/bicycles.php';
    }

    public function Rentals()
    {
        $model = $this->rentalService->getAll();

        require __DIR__ . '/../views/admin/rentals.php';
    }

    public function addUser()
    {
        require __DIR__ . '/../views/admin/addUser.php';
    }

    public function editUser()
    {
        $model = $this->loginService->getAll();

        require __DIR__ . '/../views/admin/editUser.php';
    }

    public function addBicycle()
    {
        require __DIR__ . '/../views/admin/addBicycle.php';
    }

    public function editBicycle()
    {
        $model = $this->catalogueService->getAll();

        require __DIR__ . '/../views/admin/editBicycle.php';
    }

    public function addRental()
    {
        require __DIR__ . '/../views/admin/addRental.php';
    }

    public function editRental()
    {
        $model = $this->rentalService->getAll();

        require __DIR__ . '/../views/admin/editRental.php';
    }

    public function logOut()
    {
        session_destroy();
        header('Location: /home/index');
    }
}