<?php


include __DIR__ . '/../services/CatalogueService.php';

class CatalogueController
{
    private $catalogueService;

    function __construct()
    {
        $this->catalogueService = new CatalogueService();
    }

    public function index()
    {
        $model = $this->catalogueService->getAll();

        require __DIR__ . '/../views/catalogue/index.php';
    }
}