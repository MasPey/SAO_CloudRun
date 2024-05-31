<?php
    session_start();

    // Mendefinisikan URL API
    $url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/authenticate.php';

    // Membuat data yang akan dikirimkan ke API
    $data = array(
        'id' => $_POST['id'],
        'password' => $_POST['pw']
    );

    // Membuat opsi untuk request cURL
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false
    );

    // Inisialisasi cURL
    $ch = curl_init();

    // Mengatur opsi cURL
    curl_setopt_array($ch, $options);

    // Menjalankan cURL untuk mendapatkan respons
    $response = curl_exec($ch);

    // Menutup koneksi cURL
    curl_close($ch);

    // Mendekodekan respons JSON menjadi array asosiatif
    $result = json_decode($response, true);

    // Memeriksa apakah autentikasi berhasil atau gagal
    if (isset($result['message']) && $result['message'] === 'Authentication successful') {
        // Autentikasi berhasil, set session dan redirect ke halaman admin
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['api_key'] = $result['api_key'];
        header("location: admin.php");
    } else {
        // Autentikasi gagal, redirect ke halaman login dengan status failed
        header("location: login.php?status=failed");
    }
?>
