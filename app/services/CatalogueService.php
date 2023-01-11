<?php
require __DIR__ . '/../repositories/CatalogueRepository.php';
class catalogueService
{
    public function getAll() {
        $repository = new cataloguerepository();
        return $repository->getAll();
    }
}