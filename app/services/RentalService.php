<?php
require __DIR__ . '/../repositories/RentalRepository.php';
class RentalService
{
    public function getAll() {
        $repository = new RentalRepository();
        return $repository->getAll();
    }

    public function getById(mixed $id)
    {
        $repository = new RentalRepository();
        return $repository->getById($id);
    }

    public function addRental($bikeId, $email, $startDate, $endDate, $price) : void
    {
        $repository = new RentalRepository();
        $repository->addRental($bikeId, $email, $startDate, $endDate, $price);
    }

    public function editRental($orderId, $bikeId, $email, $startDate, $endDate, $price) : void
    {
        $repository = new RentalRepository();
        $repository->editRental($orderId, $bikeId, $email, $startDate, $endDate, $price);
    }

    public function deleteRental($id) : void
    {
        $repository = new RentalRepository();
        $repository->deleteRental($id);
    }

    public function insert(Rental $id)
    {
        $repository = new RentalRepository();
        $repository->addRental($id->getBikeId(), $id->getUserEmail(), $id->getStartDate(), $id->getEndDate(), $id->getPrice());
    }
}