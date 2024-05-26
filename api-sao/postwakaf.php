<?php
// Import file database.php untuk mendapatkan koneksi ke database
require_once('database.php');

// Set response header to JSON
header('Content-Type: application/json');


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Parse data from php://input and merge with $_POST
    $inputData = json_decode(file_get_contents('php://input'), true);
    $data = array_merge($_POST, (array)$inputData);

    // Check if all required fields are present
    if (
        isset($data['jenis'])
    ) {
        // Assign POST data to variables
        $jenis = $data['jenis'];

        // Create database connection
        $db = new Database();
        $db_connect = $db->getConnection();

        // Prepare SQL query to insert data
        $query = "INSERT INTO wakaf (jenis) VALUES (?)";
        $stmt = $db_connect->prepare($query);

        // Bind parameters to the SQL query
        $stmt->bind_param("s", $jenis);

        // Execute the query
        if ($stmt->execute()) {
            // Send a success response
            echo json_encode(array('message' => 'Data successfully inserted'));
        } else {
            // Send an error response if the query fails
            echo json_encode(array('message' => 'Data insertion failed', 'error' => $stmt->error));
        }

        // Close the statement and connection
        $stmt->close();
        $db_connect->close();
    } else {
        // Send an error response if required fields are missing
        echo json_encode(array('message' => 'Missing required fields'));
    }
} else {
    // Send an error response if the request method is not POST
    echo json_encode(array('message' => 'Invalid request method'));
}
?>
