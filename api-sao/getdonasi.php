<?php
require_once('database.php');

$db = new Database();
$db_connect = $db->getConnection();

$query = "SELECT * FROM donasi";
$sql = $db_connect->query($query);

if($sql){
    $result = array();
    while ($row = $sql->fetch_assoc()){
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
    
    echo json_encode(array('result' => $result));
} else {
    echo json_encode(array("message" => "No records found."));
}

$db_connect->close();

?>