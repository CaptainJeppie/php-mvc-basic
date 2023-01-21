<?php

include __DIR__ . '/../../services/CatalogueService.php';

class CatalogueController
{
    private $catalogueService;

    function __construct()
    {
        $this->catalogueService = new catalogueService();
    }

    // router maps this to /api/catalogue automatically
    public function index()
    {

        // Respond to a GET request to /api/catalogue
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // your code here
            // return all bikes in the database as JSON

            $result = $this->catalogueService->getAll();

            header('Content-Type: application/json');
            echo json_encode($result);
        }

        // Respond to a POST request to /api/catalogue
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // your code here
            // read JSON from the request, convert it to a bike object
            // and have the service insert the bike into the database

            // Get the raw JSON data from the request body
            $json = file_get_contents("php://input");

            // Convert the JSON data to an associative array
            $data = json_decode($json, true);

            // Create a new Bike object using the data from the array
            $bike = new Bicycle($data["name"], $data["category"], $data["description"], $data["picture"], $data["priceperday"], $data["deposit"], $data["isAvailable"]);

            // Insert the bike into the database
            $this->catalogueService->insert($bike);

            // Return a success message
            echo json_encode(["message" => "Bike added successfully!"]);

        }

        //respond to a DELETE request to /api/catalogue
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            // your code here
            // read JSON from the request, convert it to a bike object
            // and have the service delete the bike from the database

            // Get the bikes ID from the query parameter
            $bikeId = $_GET["id"];

            // Delete the bike from the database
            $this->catalogueService->deleteBicycle($bikeId);

            // Return a success message
            echo json_encode(["status" => "success", "message" => "Bike deleted successfully!"]);

        }
    }
}