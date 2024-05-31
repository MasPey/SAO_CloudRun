<?php
// Import file database.php untuk mendapatkan koneksi ke database
require_once('database.php');

// Inisialisasi objek Database
$db = new Database();

// Mendapatkan koneksi ke database
$db_connect = $db->getConnection();

// Memeriksa apakah parameter api_key ada dalam URL
if (isset($_GET['api_key'])) {
    // Mendapatkan api_key dari parameter URL
    $apiKey = $_GET['api_key'];

    // Query untuk memeriksa apakah ada entri dengan api_key yang cocok di tabel admin
    $query = "SELECT * FROM admin WHERE api_key = ?";
    $stmt = $db_connect->prepare($query);
    $stmt->bind_param("s", $apiKey);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika api_key valid, lanjutkan dengan mengambil data dari tabel donasi
    if ($result->num_rows > 0) {
        // Query untuk mengambil data dari tabel donasi
        $query = "SELECT * FROM donasi";

        // Eksekusi query
        $sql = $db_connect->query($query);

        // Periksa apakah query berhasil dieksekusi
        if ($sql) {
            $result = array(); // Array untuk menyimpan hasil data
            while ($row = $sql->fetch_assoc()) {
                // Tambahkan data ke dalam array result
                array_push($result, array(
                    'id' => $row['id'],
                    'nama' => $row['nama'],
                    'kontak' => $row['kontak'],
                    'email' => $row['email'],
                    'catatan' => $row['catatan'],
                    'program' => $row['program'],
                    'jenis' => $row['jenis'],
                    'jumlah' => $row['jumlah'],
                    'pembayaran' => $row['pembayaran'],
                    'status' => $row['status'],
                ));
            }

            // Mengembalikan hasil dalam format JSON
            echo json_encode(array('result' => $result));
        } else {
            // Jika query tidak berhasil dieksekusi, kirim pesan JSON
            echo json_encode(array("message" => "No records found."));
        }
    } else {
        // Jika api_key tidak valid, kirim pesan JSON
        echo json_encode(array("message" => "Invalid API key."));
    }
} else {
    // Jika parameter api_key tidak ada dalam URL, kirim pesan JSON
    echo json_encode(array("message" => "Missing API key."));
}

// Tutup koneksi database
$db_connect->close();
?>
