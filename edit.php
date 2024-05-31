<?php
session_start();

if (empty($_SESSION['id'])) {
    header("location: login.php?status=notlogin");
    exit(); // Hentikan eksekusi skrip setelah mengarahkan
}

// Ambil data dari $_POST
$edit = $_POST['id'];
$status = strtoupper($_POST['status']);

// Buat data yang akan dikirim dalam permintaan PUT
$data = array(
    'id' => $edit,
    'status' => $status
);

// URL endpoint API
$url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/putdonasi.php?api_key=' . $_SESSION['api_key'];

// Inisialisasi curl
$ch = curl_init();

// Set URL dan opsi lainnya
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Eksekusi permintaan
$response = curl_exec($ch);

// Tangani respons
if ($response === false) {
    // Permintaan gagal
    echo 'Error: ' . curl_error($ch);
} else {
    // Permintaan berhasil
    header("location: admin.php");
}

// Tutup curl
curl_close($ch);
?>
