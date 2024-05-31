<?php
// Import file database.php untuk mendapatkan koneksi ke database
require_once('database.php');

// Set response header to JSON
header('Content-Type: application/json');

// Cek apakah methodnya DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Parse data from php://input
    parse_str(file_get_contents('php://input'), $value);

    // Cek apakah id ada di set parameter
    if (isset($value['id'])) {
        $id = $value['id'];

        // Cek api_key
        if (isset($_GET['api_key'])) {
            $apiKey = $_GET['api_key'];

            $db = new Database();
            $db_connect = $db->getConnection();

            // Cek api_key apakah valid
            $query = "SELECT * FROM admin WHERE api_key = ?";
            $stmt = $db_connect->prepare($query);
            $stmt->bind_param("s", $apiKey);
            $stmt->execute();
            $result = $stmt->get_result();

            // Jika valid menjalankan query DELETE
            if ($result->num_rows > 0) {
                $query = "DELETE FROM sedekah WHERE id = ?";
                $stmt = $db_connect->prepare($query);
                $stmt->bind_param("i", $id);

                if ($stmt->execute()) {
                    echo json_encode(array('message' => 'Data successfully deleted'));
                } else {
                    echo json_encode(array('message' => 'Data deletion failed', 'error' => $stmt->error));
                }

                $stmt->close();
                $db_connect->close();
            } else {
                // Jika api_key invalid
                echo json_encode(array('message' => 'Invalid API key'));
            }
        } else {
            // Jika api_key tidak ada
            echo json_encode(array('message' => 'Missing API key'));
        }
    } else {
        // Jika id tidak ada
        echo json_encode(array('message' => 'Missing required parameter: id'));
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('message' => 'Method not allowed'));
}
?>
