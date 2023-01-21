<?php
require_once __DIR__ . '/repository.php';
require __DIR__ . '/../models/User.php';
class UserRepositroy extends Repository
{
    function getAll() {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users");
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

            $stmt = $this->connection->prepare("SELECT * FROM Users WHERE id = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function addUser(mixed $name, mixed $email, mixed $phoneNumber, mixed $password)
    {
        try {
            $name = htmlspecialchars($name);
            $email = htmlspecialchars($email);
            $phoneNumber = htmlspecialchars($phoneNumber);
            $password = htmlspecialchars($password);

            $stmt = $this->connection->prepare("INSERT INTO Users (name, email, phoneNumber, password) VALUES (:name, :email, :phoneNumber, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function editUser(mixed $id, mixed $name, mixed $email, mixed $phoneNumber, mixed $password)
    {
        try {
            $idd = htmlspecialchars($id);
            $name = htmlspecialchars($name);
            $email = htmlspecialchars($email);
            $phoneNumber = htmlspecialchars($phoneNumber);
            $password = htmlspecialchars($password);

            $stmt = $this->connection->prepare("UPDATE Users SET name = :name, email = :email, phoneNumber = :phoneNumber, password = :password WHERE id = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }

    public function deleteUser(mixed $id)
    {
        try {
            $idd = htmlspecialchars($id);

            $stmt = $this->connection->prepare("DELETE FROM Users WHERE id = :id");
            $stmt->bindParam(':id', $idd);
            $stmt->execute();
        } catch (PDOException $e)
        {
            echo $e;
        }
    }
}