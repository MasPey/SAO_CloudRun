<?php
session_start();
if (empty($_SESSION['id'])) {
    header("location: login.php?status=notlogin");
}

$hapus = $_POST['id'];
$tabel = $_POST['program'];
$jenis = $_POST['jenis'];

// URL untuk API deletesedekah.php dan postsedekah.php
$deletesedekah_url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/deletesedekah.php?api_key=' . $_SESSION['api_key'];
$postsedekah_url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/postsedekah.php?api_key=' . $_SESSION['api_key'];

// URL untuk API deletewakaf.php dan postwakaf.php
$deletewakaf_url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/deletewakaf.php?api_key=' . $_SESSION['api_key'];
$postwakaf_url = 'https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/postwakaf.php?api_key=' . $_SESSION['api_key'];

// Menentukan URL API berdasarkan tabel
if ($tabel == 'sedekah') {
    $delete_url = $deletesedekah_url;
    $post_url = $postsedekah_url;
} elseif ($tabel == 'wakaf') {
    $delete_url = $deletewakaf_url;
    $post_url = $postwakaf_url;
} else {
    die("Invalid table name");
}

if ($hapus != 0) {
    // Inisialisasi curl session untuk DELETE request
    $delete_curl = curl_init();
    curl_setopt_array($delete_curl, array(
        CURLOPT_URL => $delete_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_POSTFIELDS => http_build_query(array('id' => $hapus)),
    ));

    // Eksekusi curl session untuk DELETE request
    $delete_response = curl_exec($delete_curl);
    $delete_error = curl_error($delete_curl);
    curl_close($delete_curl);

    // Jika terjadi kesalahan pada DELETE request, Anda dapat menangani atau menampilkan pesan kesalahan di sini
    if ($delete_error) {
        echo "Error: " . $delete_error;
    }
} else {
    // Inisialisasi curl session untuk POST request
    $post_curl = curl_init();
    curl_setopt_array($post_curl, array(
        CURLOPT_URL => $post_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query(array('jenis' => $jenis)),
    ));

    // Eksekusi curl session untuk POST request
    $post_response = curl_exec($post_curl);
    $post_error = curl_error($post_curl);
    curl_close($post_curl);

    // Jika terjadi kesalahan pada POST request, Anda dapat menangani atau menampilkan pesan kesalahan di sini
    if ($post_error) {
        echo "Error: " . $post_error;
    }
}

// Setelah menyelesaikan request, arahkan kembali ke halaman admin.php
header("location: admin.php");
?>
