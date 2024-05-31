<?php
require_once('database.php');

// Set response header to JSON
header('Content-Type: application/json');

// Check if the request method is PUT
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Parse data from php://input
    parse_str(file_get_contents("php://input"), $putData);
    $inputData = json_decode(file_get_contents('php://input'), true);
    if (empty($inputData)) {
        $inputData = $putData;
    }

    // Check if api_key is provided in the URL
    if (isset($_GET['api_key'])) {
        $apiKey = $_GET['api_key'];

        // Create database connection
        $db = new Database();
        $db_connect = $db->getConnection();

        // Query to check if the api_key is valid
        $query = "SELECT * FROM admin WHERE api_key = ?";
        $stmt = $db_connect->prepare($query);
        $stmt->bind_param("s", $apiKey);
        $stmt->execute();
        $result = $stmt->get_result();

        // If api_key is valid, proceed with the update operation
        if ($result->num_rows > 0) {
            // Check if required fields are present
            if (isset($inputData['id']) && isset($inputData['status'])) {
                // Assign PUT data to variables
                $id = $inputData['id'];
                $status = $inputData['status'];

                // Prepare SQL query to update data
                $query = "UPDATE donasi SET status = ? WHERE id = ?";
                $stmt = $db_connect->prepare($query);

                // Bind parameters to the SQL query
                $stmt->bind_param("si", $status, $id);

                // Execute the query
                if ($stmt->execute()) {
                    // Send a success response
                    echo json_encode(array('message' => 'Data successfully updated'));
                } else {
                    // Send an error response if the query fails
                    echo json_encode(array('message' => 'Data update failed', 'error' => $stmt->error));
                }

                // Close the statement and connection
                $stmt->close();
                $db_connect->close();
            } else {
                // Send an error response if required fields are missing
                echo json_encode(array('message' => 'Missing required fields'));
            }
        } else {
            // If api_key is invalid, send an error response
            echo json_encode(array('message' => 'Invalid API key'));
        }
    } else {
        // If api_key is not provided, send an error response
        echo json_encode(array('message' => 'Missing API key'));
    }
} else {
    // Send an error response if the request method is not PUT
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('message' => 'Method not allowed'));
}
?>
