<?php
// Import file database.php untuk mendapatkan koneksi ke database
require_once('database.php');

// Inisialisasi objek Database
$db = new Database();

// Mendapatkan koneksi ke database
$db_connect = $db->getConnection();

// Query untuk mengambil data dari tabel sedekah
$query = "SELECT * FROM wakaf";

// Eksekusi query
$sql = $db_connect->query($query);

// Periksa apakah query berhasil dieksekusi
if($sql){
    $result = array(); // Array untuk menyimpan hasil data
    while ($row = $sql->fetch_assoc()){
        // Tambahkan data ke dalam array result
        array_push($result, array(
            'id' => $row['id'],
            'jenis' => $row['jenis']
        ));
    }
    
    // Mengembalikan hasil dalam format JSON
    echo json_encode(array('result' => $result));
} else {
    // Jika query tidak berhasil dieksekusi, kirim pesan JSON
    echo json_encode(array("message" => "No records found."));
}

// Tutup koneksi database
$db_connect->close();
?>
