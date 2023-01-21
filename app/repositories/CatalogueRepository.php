<?php
require_once __DIR__ . '/repository.php';
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

    public function getById(mixed $id)
    {
        try {
            $idd = htmlspecialchars($id);

            $stmt = $this->connection->prepare("SELECT * FROM Bicycle WHERE id = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function rent(int $id, string $email, $startDate, $endDate, float $price) {
        try {
            $idd = htmlspecialchars($id);
            $emaill = htmlspecialchars($email);
            $startDatee = htmlspecialchars($startDate);
            $endDatee = htmlspecialchars($endDate);
            $pricee = htmlspecialchars($price);

            $stmt = $this->connection->prepare("INSERT INTO `Rentals`(`bicycleId`, `email`, `startDate`, `endDate`, `price`) VALUES (:bicycle_id, :email, :start_date, :end_date, :price);");
            $stmt->bindParam('bicycle_id', $idd);
            $stmt->bindParam('email', $emaill);
            $stmt->bindParam('start_date', $startDatee);
            $stmt->bindParam('end_date', $endDatee);
            $stmt->bindParam('price', $pricee);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addBicycle($name, $category, $description, $picture, $borg, $priceperday)
    {
        try {
            $namee = htmlspecialchars($name);
            $categoryy = htmlspecialchars($category);
            $descriptionn = htmlspecialchars($description);
            $picturee = htmlspecialchars($picture);
            $borgg = htmlspecialchars($borg);
            $priceperdayy = htmlspecialchars($priceperday);

            $stmt = $this->connection->prepare("INSERT INTO `Bicycle`(`name`, `category`, `description`, `picture`, `borg`, `priceperday`) VALUES (:name, :category, :description, :picture, :borg, :priceperday);");
            $stmt->bindParam('name', $namee);
            $stmt->bindParam('category', $categoryy);
            $stmt->bindParam('description', $descriptionn);
            $stmt->bindParam('picture', $picturee);
            $stmt->bindParam('borg', $borgg);
            $stmt->bindParam('priceperday', $priceperdayy);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function editBicycle($id, $name, $availability, $category, $description, $picture, $borg, $priceperday)
    {
        try {
            $idd = htmlspecialchars($id);
            $namee = htmlspecialchars($name);
            $availabilityy = htmlspecialchars($availability);
            $categoryy = htmlspecialchars($category);
            $descriptionn = htmlspecialchars($description);
            $picturee = htmlspecialchars($picture);
            $borgg = htmlspecialchars($borg);
            $priceperdayy = htmlspecialchars($priceperday);

            $stmt = $this->connection->prepare("UPDATE `Bicycle` SET `name`=:name,`isAvailable`=:availability,`category`=:category,`description`=:description,`picture`=:picture,`borg`=:borg,`priceperday`=:priceperday WHERE id = :id");
            $stmt->bindParam('id', $idd);
            $stmt->bindParam('name', $namee);
            $stmt->bindParam('availability', $availabilityy);
            $stmt->bindParam('category', $categoryy);
            $stmt->bindParam('description', $descriptionn);
            $stmt->bindParam('picture', $picturee);
            $stmt->bindParam('borg', $borgg);
            $stmt->bindParam('priceperday', $priceperdayy);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function deleteBicycle($id)
    {
        try {
            $idd = htmlspecialchars($id);

            $stmt = $this->connection->prepare("DELETE FROM `Bicycle` WHERE id = :id");
            $stmt->bindParam('id', $idd);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}