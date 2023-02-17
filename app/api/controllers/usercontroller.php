<?php

include __DIR__ . '/../../services/LoginService.php';

class usercontroller
{
    private $loginService;

    function __construct()
    {
        $this->loginService = new LoginService();
    }

    // router maps this to /api/user automatically
    public function index()
    {

        // Respond to a GET request to /api/user
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // your code here
            // return all users in the database as JSON

            $result = $this->loginService->getAll();

            header('Content-Type: application/json');
            echo json_encode($result);
        }

        // Respond to a POST request to /api/user
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // your code here
            // read JSON from the request, convert it to a user object
            // and have the service insert the user into the database

            // Get the raw JSON data from the request body
            $json = file_get_contents("php://input");

            // Convert the JSON data to an associative array
            $data = json_decode($json, true);

            // Create a new Users object using the data from the array
            $id = new User($data["name"], $data["email"], $data["phoneNumber"], $data["password"]);

            // Insert the user into the database
            $this->loginService->insert($id);

            // Return a success message
            echo json_encode(["message" => "User added successfully!"]);

        }

        //respond to a DELETE request to /api/user
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            // your code here
            // read JSON from the request, convert it to a user object
            // and have the service delete the user from the database

            // Get the user's ID from the query parameter
            $userId = $_GET["id"];

            // Delete the user from the database
            $this->loginService->deleteUser($userId);

            // Return a success message
            echo json_encode(["status" => "success", "message" => "User deleted successfully!"]);

        }
    }
}