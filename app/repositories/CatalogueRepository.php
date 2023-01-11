<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/Bicycle.php';
class CatalogueRepository extends Repository
{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Bicycle");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}