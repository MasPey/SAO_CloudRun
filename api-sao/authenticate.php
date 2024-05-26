<?php
// Mengimpor file database.php untuk konfigurasi koneksi ke database MySQL
require_once('database.php');

// Mengatur tipe konten respons sebagai JSON
header('Content-Type: application/json');

// Memeriksa apakah metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menganalisis data dari x-www-form-urlencoded jika tersedia, jika tidak, menganalisis data dari php://input dalam format JSON
    if (!empty($_POST)) {
        // Data diterima dari x-www-form-urlencoded
        $inputData = $_POST;
    } else {
        // Menganalisis data yang diterima dari php://input dalam format JSON
        $inputData = json_decode(file_get_contents('php://input'), true);
    }

    // Memeriksa apakah semua bidang yang diperlukan telah disertakan
    if (isset($inputData['id']) && isset($inputData['password'])) {
        // Mendapatkan id dan password dari data yang diterima
        $id = $inputData['id'];
        $password = $inputData['password'];

        // Membuat koneksi ke database MySQL
        $db = new Database();
        $db_connect = $db->getConnection();

        // Mempersiapkan pernyataan SQL untuk memeriksa apakah ada entri di tabel admin yang cocok dengan id dan password yang diberikan
        $query = "SELECT * FROM admin WHERE id = ? AND password = ?";
        $stmt = $db_connect->prepare($query);

        // Mengikat nilai parameter ke pernyataan SQL
        $stmt->bind_param("ss", $id, $password);

        // Menjalankan pernyataan SQL
        if ($stmt->execute()) {
            // Mendapatkan hasil dari eksekusi query
            $result = $stmt->get_result();

            // Memeriksa apakah ada baris yang sesuai dengan id dan password yang diberikan
            if ($result->num_rows > 0) {
                // Jika autentikasi berhasil, kirim respons dengan pesan "Authentication successful"
                echo json_encode(array('message' => 'Authentication successful'));
            } else {
                // Jika autentikasi gagal, kirim respons dengan pesan "Authentication failed"
                echo json_encode(array('message' => 'Authentication failed'));
            }
        } else {
            // Jika terjadi kesalahan saat mengeksekusi query, kirim respons dengan pesan kesalahan
            echo json_encode(array('message' => 'Error executing query'));
        }
        // Menutup pernyataan dan koneksi database
        $stmt->close();
        $db_connect->close();
    } else {
        // Jika salah satu bidang yang diperlukan tidak disertakan, kirim respons dengan pesan kesalahan
        echo json_encode(array('message' => 'Missing required fields'));
    }
} else {
    // Jika metode permintaan bukan POST, kirim respons dengan pesan kesalahan
    echo json_encode(array('message' => 'Invalid request method'));
}
?>
