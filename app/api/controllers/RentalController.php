<?php

include __DIR__ . '/../../services/RentalService.php';

class RentalController
{
    private $rentalService;

    function __construct()
    {
        $this->rentalService = new RentalService();
    }

    // router maps this to /api/rental automatically
    public function index()
    {

        // Respond to a GET request to /api/rental
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // your code here
            // return all rentals in the database as JSON

            $result = $this->rentalService->getAll();

            header('Content-Type: application/json');
            echo json_encode($result);
        }

        // Respond to a POST request to /api/rental
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // your code here
            // read JSON from the request, convert it to a rental object
            // and have the service insert the rental into the database

            // Get the raw JSON data from the request body
            $json = file_get_contents("php://input");

            // Convert the JSON data to an associative array
            $data = json_decode($json, true);

            // Create a new rentals object using the data from the array
            $id = new Rental($data["bikeId"], $data["userEmail"], $data["startDate"], $data["endDate"], $data["price"]);

            // Insert the rental into the database
            $this->rentalService->insert($id);

            // Return a success message
            echo json_encode(["message" => "rental added successfully!"]);

        }

        //respond to a DELETE request to /api/rental
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            // your code here
            // read JSON from the request, convert it to a rental object
            // and have the service delete the rental from the database

            // Get the rentals ID from the query parameter
            $orderId = $_GET["id"];

            // Delete the rental from the database
            $this->rentalService->deleteRental($orderId);

            // Return a success message
            echo json_encode(["status" => "success", "message" => "Rental deleted successfully!"]);

        }
    }
}