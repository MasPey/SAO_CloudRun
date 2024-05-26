<?php
// Import file database.php untuk mendapatkan koneksi ke database
require_once('database.php');

// Set response header to JSON
header('Content-Type: application/json');

parse_str(file_get_contents('php://input'),$value);

$id = $value['id'];

 // Create database connection
 $db = new Database();
 $db_connect = $db->getConnection();

$query = "DELETE FROM wakaf WHERE id = '$id' ";
$sql = mysqli_query($db_connect, $query);

if ($sql) {
    echo json_encode(array('message' => 'deleted!'));
} else {
    echo json_encode(array('message' => 'error!'));
}


?>
