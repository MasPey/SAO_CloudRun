<html>

<head>
    <title>TERIMAKASIH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    * {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    body {
        background-image: linear-gradient(rgba(34, 191, 187, 0.2), rgba(34, 191, 187, 0.1), rgba(34, 191, 187, 0.3));
    }

    .sedekah {
        margin-top: 2%;
    }

    .sedekah h6 {
        text-align: center;
    }

    nav {
        background-image: linear-gradient(to bottom right, white, powderblue);
        border: solid powderblue;
    }

    .offcanvas {
        background-image: linear-gradient(white, powderblue);
    }

    .nav-link {
        font-weight: bold;
    }

    nav .nav-item {
        border-bottom: solid powderblue;
    }

    .form {
        border-right: solid #22bfbb 5px;
        border-bottom-right-radius: 50px;
    }

    .input-group,
    .form-select {
        border: solid rgba(34, 191, 187, 0.5) 2px;
        border-radius: 10px;
    }

    .form-control,
    .input-group-text {
        border: solid #22bfbb 1px;
    }

    option {
        background-color: powderblue;
    }

    .btnf {
        border: solid #22bfbb;
        border-radius: 10px;
        color: darkslategray;
        font-size: 15px;
        background-color: powderblue;
        font-weight: bolder;
        padding: 10px;
        text-decoration: none;
    }

    .btnf:hover {
        color: black;
        background-color: rgba(34, 191, 187, 0.5);
        transition: 0.5s;
    }
</style>

<body>
    <nav class="navbar sticky-top" style="padding: 2px;">
        <div class="container-fluid">
            <button style="border: solid #22bfbb;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand col-11" href="index.php"><img src="foto/saonav.png" alt="logo" width="25%"></a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="foto/saonav.png" alt="logo" width="90%"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Admin</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Program
                            </a>
                            <ul class="dropdown-menu" style="border: solid powderblue;">
                                <li><a class="dropdown-item" href="sedekah.php">Sedekah</a></li>
                                <hr class="dropdown-divider" color="powderblue">
                                <li><a class="dropdown-item" href="wakaf.php">Wakaf</a></li>
                            </ul>
                        </li><br><br>
                        <li class="text-center">
                            <img src="foto/sao.png" alt="logo" width="70%">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <main class="sedekah">
        <div>
            <form>
                <div class="container">
                    <div class="row">
                        <div class="col form">
                            <div style="background-color: powderblue; border-bottom: solid #22bfbb 6px;">
                                <h1 style="text-align: center;"><?= strtoupper("DATA " . $_POST['program']); ?></h1>
                            </div><br>
                            <select class="form-select" aria-label="Default select example" name="jenis" disabled>
                                <option><?= strtoupper($_POST['program'] . " " . $_POST['jenis']); ?></option>
                            </select><br>
                            <label for="nom">Jumlah</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">*Rp.</span>
                                <input type="number" id="nom" class="form-control" name="jumlah" value="<?= $_POST['jumlah']; ?>" disabled>
                                <span class="input-group-text">*Pembayaran</span>
                                <input type="text" class="form-control" name="payment" value="<?= $_POST['payment']; ?>" disabled>
                            </div>
                            <h2 style="background-color: powderblue; margin-bottom: -4%; text-align: center;">DATA DONATUR</h2><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">*Nama</span>
                                <input type="text" class="form-control" name="nama" value="<?= $_POST['nama']; ?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">*Kontak</span>
                                <input type="number" class="form-control" name="kontak" value="<?= $_POST['kontak']; ?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">Email</span>
                                <input type="email" class="form-control" name="email" value="<?= $_POST['email']; ?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">Catatan</span>
                                <textarea class="form-control" rows="2" name="catatan" placeholder="<?= $_POST['catatan']; ?>" disabled></textarea>
                            </div>
                        </div>
                        <div class="col text-center form">
                            <div style="background-color: powderblue; border-bottom: solid #22bfbb 6px;">
                                <h1>TERIMAKASIH</h1>
                            </div><br>
                            <p style="text-align: center;"><?= "Terimakasih " . strtoupper($_POST['nama']) . " atas donasinya :)"; ?></p>
                            <p style="text-align: center;">"Blessed are those who can give without remembering and take without forgetting."</p>
                            <img src="foto/sao.png" alt="foto" width="60%">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    
    <footer>
        <div class="card text-center">
            <div class="card-header" style="background-color: powderblue;">
                <img src="foto/saonav.png" alt="logonav" width="15%">
            </div>
            <div class="card-body">
                <p>Sedekah tidak membuatmu miskin !, Marilah kita meraih akhirat dengan memperbaiki dunia</p>
                <a href="index.php#sedekah" class="btnf">SEDEKAH</a>&emsp;&emsp;&emsp;
                <a href="index.php#wakaf" class="btnf">WAKAF</a>
            </div><br>
            <div class="card-footer" style="background-color: rgba(34, 191, 187, 1);">
                Copyright &copy;2022 | SAO - SEDEKAH AMAL ONLINE
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
<?php
$connect = new mysqli('34.101.187.105', 'root', '', 'sao');
// if ($_POST['jumlah'] != NULL) {
//     $query = mysqli_query($connect, "INSERT INTO donasi VALUES 
//     (NULL, '$_POST[nama]', '$_POST[kontak]', '$_POST[email]', '$_POST[catatan]', '$_POST[program]', '$_POST[jenis]', '$_POST[jumlah]', '$_POST[payment]', 'PROSES')");
// } else {
//     trigger_error('ERROR ! DONASI ZONK');
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = 'http://localhost/prakweb/PROJEK%20AKHIR/api-sao/postdonasi.php';
    $data = [
        'nama' => $_POST['nama'],
        'kontak' => $_POST['kontak'],
        'email' => $_POST['email'],
        'catatan' => $_POST['catatan'],
        'program' => $_POST['program'],
        'jenis' => $_POST['jenis'],
        'jumlah' => $_POST['jumlah'],
        'pembayaran' => $_POST['payment'],
        'status' => 'PROSES'
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $result = curl_exec($ch);

    if ($result !== FALSE) {
        echo "<script>alert('Terimakasih atas Donasinya');</script>";
    } else {
        echo "<script>alert('Data insertion failed.');</script>";
    }

    curl_close($ch);
}

?>