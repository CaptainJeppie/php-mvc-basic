<?php
include __DIR__ . '/../header.php'; ?>

<h1>login page!</h1>


<?php

include __DIR__ . '/../../config/dbconfig.php';
include __DIR__ . '/../../models/User.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    try {
        $stmt = $conn->prepare('SELECT * FROM Users');
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($stmt);
        print_r($row);
        if( ! $row)
        {
            echo 'nothing found';
        }
        else
        {
            foreach ($row as $user) {
                echo $user['name'];
            }
        }

    } catch (PDOException $e) {
        echo $e;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<?php
include __DIR__ . '/../footer.php';
?>
