<?php
require __DIR__ . '/../repositories/CatalogueRepository.php';
class catalogueService
{
    public function getAll() {
        $repository = new cataloguerepository();
        return $repository->getAll();
    }

    public function getById(mixed $id)
    {
        $repository = new cataloguerepository();
        return $repository->getById($id);
    }

    public function rent($id, $email, $startDate, $endDate, $price): void
    {
        $repository = new cataloguerepository();
        $repository->rent($id, $email, $startDate, $endDate, $price);
    }

    public function addBicycle($name, $category, $description, $picture, $borg, $priceperday): void
    {
        $repository = new cataloguerepository();
        $repository->addBicycle($name, $category, $description, $picture, $borg, $priceperday);
    }

    public function editBicycle($id, $name, $availability, $category, $description, $picture, $borg, $priceperday): void
    {
        $repository = new cataloguerepository();
        $repository->editBicycle($id, $name, $availability, $category, $description, $picture, $borg, $priceperday);
    }

    public function deleteBicycle($id): void
    {
        $repository = new cataloguerepository();
        $repository->deleteBicycle($id);
    }
}