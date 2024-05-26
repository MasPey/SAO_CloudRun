<?php
function listDirectory($path, $ignore = array()) {
    $files = scandir($path);
    echo "<ul>";
    foreach ($files as $file) {
        if (!in_array($file, $ignore)) {
            $filePath = $path . '/' . $file;
            if (is_dir($filePath)) {
                echo "<li><a href='?path=$filePath'>$file/</a></li>";
            } else {
                echo "<li><a href='$filePath'>$file</a></li>";
            }
        }
    }
    echo "</ul>";
}

$path = isset($_GET['path']) ? $_GET['path'] : '.';
$ignore = array('.', '..', 'index.php'); // Add any files or directories you want to ignore

if ($path === './api-sao') {
    $filesToDisplay = array('admin.php', 'cek_login.php', 'donasi.php', 'edit.php', 'index.php', 'login.php', 'logout.php', 'sedekah.php', 'update.php', 'wakaf.php');
    echo "<h1>Listing for /api-sao</h1>";
    echo "<ul>";
    foreach ($filesToDisplay as $file) {
        $filePath = $path . '/' . $file;
        echo "<li><a href='$filePath'>$file</a></li>";
    }
    echo "</ul>";
} else {
    echo "<h1>Directory Listing for $path</h1>";
    listDirectory($path, $ignore);
}
?>
