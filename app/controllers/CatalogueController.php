<?php

include __DIR__ . '/../services/CatalogueService.php';

class cataloguecontroller
{
    private $catalogueService;

    function __construct()
    {
        $this->catalogueService = new CatalogueService();
    }

    public function index()
    {
        $model = $this->catalogueService->getAll();

        $this->ChooseHeader();

        require __DIR__ . '/../views/catalogue/index.php';
    }

    public function detail()
    {
        $this->ChooseHeader();
        $id = $_POST['act'];
        $model = $this->catalogueService->getById($id);

        require __DIR__ . '/../views/catalogue/detail.php';
    }

    public function rent()
    {
        if ($_POST){
            if (isset($_POST['email']) && isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['bikeID'])) {
                $email = $_POST['email'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $bikeID = $_POST['bikeID'];

                $bike = $this->catalogueService->getById($bikeID);

                $price = $bike['priceperday'] * (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
                $price = $price + $bike['borg'];

                $this->catalogueService->rent($bike['id'], $email, $startDate, $endDate, $price);
                header('Location: /catalogue/thankyou');
            }
        }
        $this->ChooseHeader();
        $id = $_POST['act'];
        $bike = $this->catalogueService->getById($id);

        require __DIR__ . '/../views/catalogue/rent.php';
    }

    public function thankyou()
    {

        $this->ChooseHeader();

        require __DIR__ . '/../views/catalogue/thankyou.php';
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