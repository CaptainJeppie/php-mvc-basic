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
        $this->CheckUserLogin();

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

        require __DIR__ . '/../views/admin/addUser.php';
    }

    public function editUser()
    {
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


        require __DIR__ . '/../views/admin/editUser.php';
    }

    public function addBicycle()
    {
        require __DIR__ . '/../views/admin/addBicycle.php';
    }

    public function editBicycle()
    {
        if ($_POST) {
            if (isset($_POST['edit']) && isset($_POST['availability']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['description']) && isset($_POST['picture']) && isset($_POST['borg']) && isset($_POST['priceperday'])) {
                $name = $_POST['name'];
                $availability = $_POST['availability'];
                $category = $_POST['category'];
                $description = $_POST['description'];
                $picture = $_POST['picture'];
                $borg = $_POST['borg'];
                $priceperday = $_POST['priceperday'];
                $bikeId = $_POST['edit'];

                $this->catalogueService->editBicycle($bikeId, $name, $availability, $category, $description, $picture, $borg, $priceperday);
                header('Location: /admin/Bicycles');
            }
        }
        $bikeId = $_POST['edit'];
        $model = $this->catalogueService->getById($bikeId);

        require __DIR__ . '/../views/admin/editBicycle.php';
    }

    public function addRental()
    {
        if ($_POST) {
            if (isset($_POST['bikeId']) && isset($_POST['email']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['price'])) {
                $bikeId = $_POST['bikeId'];
                $email = $_POST['email'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $price = $_POST['price'];

                $this->rentalService->addRental($bikeId, $email, $startDate, $endDate, $price);
                header('Location: /admin/Rentals');
            }
        }

        require __DIR__ . '/../views/admin/addRental.php';
    }

    public function editRental()
    {
        if ($_POST) {
            if (isset($_POST['edit']) && isset($_POST['bikeId']) && isset($_POST['email']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['price'])) {
                $bikeId = $_POST['bikeId'];
                $email = $_POST['email'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $price = $_POST['price'];
                $orderId = $_POST['edit'];

                $this->rentalService->editRental($orderId, $bikeId, $email, $startDate, $endDate, $price);
                header('Location: /admin/Rentals');
            }
        }
        $id = $_POST['edit'];
        $model = $this->rentalService->getById($id);


        require __DIR__ . '/../views/admin/editRental.php';
    }

    public function logOut()
    {
        session_destroy();
        header('Location: /home/index');
    }

    private function CheckUserLogin()
    {
        if (!isset($_SESSION['status'])) {
            header('Location: /login/index');
        }
    }
}