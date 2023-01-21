<?php
require_once __DIR__ . '/repository.php';

class RentalRepository extends Repository
{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Rentals");
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function getById(mixed $id)
    {
        try {
            $idd = htmlspecialchars($id);

            $stmt = $this->connection->prepare("SELECT * FROM Rentals WHERE orderId = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addRental($bikeId, $email, $startDate, $endDate, $price)
    {
        try {
            $bikeId = htmlspecialchars($bikeId);
            $email = htmlspecialchars($email);
            $startDate = htmlspecialchars($startDate);
            $endDate = htmlspecialchars($endDate);
            $price = htmlspecialchars($price);

            $stmt = $this->connection->prepare("INSERT INTO Rentals (bicycleId, email, startDate, endDate, price) VALUES (:bicycleId, :email, :startDate, :endDate, :price)");
            $stmt->bindParam(':bicycleId', $bikeId);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function editRental($orderId, $bikeId, $email, $startDate, $endDate, $price)
    {
        try {
            $orderId = htmlspecialchars($orderId);
            $bikeId = htmlspecialchars($bikeId);
            $email = htmlspecialchars($email);
            $startDate = htmlspecialchars($startDate);
            $endDate = htmlspecialchars($endDate);
            $price = htmlspecialchars($price);

            $stmt = $this->connection->prepare("UPDATE Rentals SET bicycleId = :bicycleId, email = :email, startDate = :startDate, endDate = :endDate, price = :price WHERE orderId = :orderId");
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':bicycleId', $bikeId);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':price', $price);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function deleteRental($id)
    {
        try {
            $idd = htmlspecialchars($id);

            $stmt = $this->connection->prepare("DELETE FROM Rentals WHERE orderId = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}