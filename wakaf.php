<html>

<head>
    <title>WAKAF</title>
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

    .sedekah h5,
    h6 {
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
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Program
                            </a>
                            <ul class="dropdown-menu" style="border: solid powderblue;">
                                <li><a class="dropdown-item" href="sedekah.php">Sedekah</a></li>
                                <hr class="dropdown-divider" color="powderblue">
                                <li><a class="dropdown-item bg-info active" href="wakaf.php">Wakaf</a></li>
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
            <form action="donasi.php" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col form">
                            <div style="background-color: powderblue; text-align: center; border-bottom: solid #22bfbb 6px;">
                                <h1>ISI DATA WAKAF</h1>
                            </div><br>
                            <label for="jenis">Pilih Jenis Wakaf</label>
                            <input type="hidden" name="program" value="wakaf">
                            <select class="form-select" aria-label="Default select example" name="jenis" id="jenis">
                            <?php
                                // Inisialisasi CURL
                                $curl = curl_init();

                                // Set URL dari API getsedekah.php
                                curl_setopt($curl, CURLOPT_URL, "https://sao-restapi-q2od2bwu5a-et.a.run.app/api-sao/getwakaf.php");

                                // Set metode HTTP menjadi GET
                                curl_setopt($curl, CURLOPT_HTTPGET, true);

                                // Set agar CURL mengembalikan respons sebagai string
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                                // Lakukan request ke API
                                $response = curl_exec($curl);

                                // Tutup CURL
                                curl_close($curl);

                                // Dekode respons JSON
                                $result = json_decode($response, true);

                                // Periksa apakah respons berisi hasil yang valid
                                if (isset($result['result'])) {
                                    // Looping melalui hasil untuk menambahkan opsi ke dalam dropdown menu
                                    foreach ($result['result'] as $data) {
                                        ?>
                                        <option value="<?= $data['jenis']; ?>"><?= "sedekah " . $data['jenis']; ?></option>
                                        <?php
                                    }
                                } else {
                                    // Jika respons tidak valid, tampilkan pesan kesalahan
                                    ?>
                                    <option value="">No data available</option>
                                    <?php
                                }
                            ?>
                            </select><br>
                            <label for="nom">Masukkan Jumlah</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">*Rp.</span>
                                <input type="number" id="nom" class="form-control" name="jumlah" required>
                            </div>
                            <h2 style="background-color: powderblue; margin-bottom: -4%; text-align: center;">LENGKAPI DATA DONATUR</h2><br>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">*Nama</span>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">*Kontak</span>
                                <input type="number" class="form-control" name="kontak" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">Email</span>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-2">Catatan</span>
                                <textarea class="form-control" rows="2" placeholder="opsional" name="catatan"></textarea>
                            </div>
                        </div>
                        <div class="col form">
                            <div style="background-color: powderblue; text-align: center; border-bottom: solid #22bfbb 6px;">
                                <h1>PILIH PEMBAYARAN</h1>
                            </div><br>
                            <div class="row">
                                <div class="col" style="margin-right: 5%;">
                                    <h5>TRANSFER BANK</h5>
                                    <label for="bri">
                                        <input type="radio" class="form-check-input" id="bri" value="BRI" name="payment">
                                        BRI (140012358123) <img src="foto/bri.png" alt="..." width="50%">
                                    </label><br><br>
                                    <label for="bca">
                                        <input type="radio" class="form-check-input" id="bca" value="BCA" name="payment">
                                        BCA (8022901312) <br> <img src="foto/bca.png" alt="..." width="50%">
                                    </label><br><br>

                                    <label for="bni">
                                        <input type="radio" class="form-check-input" id="bni" value="BNI" name="payment">
                                        BNI (904199212) <br> <img src="foto/bni.png" alt="..." width="50%">
                                    </label><br><br>
                                    <label for="mandiri">
                                        <input type="radio" class="form-check-input" id="mandiri" value="MANDIRI" name="payment">
                                        MANDIRI (104213123) <img src="foto/mandiri.png" alt="..." width="50%">
                                    </label>
                                </div>
                                <div class="col">
                                    <h5>E-WALLET</h5>
                                    <label for="dana">
                                        <input type="radio" class="form-check-input" id="dana" value="DANA" name="payment">
                                        DANA (082395880770) <img src="foto/dana.png" alt="..." width="70%">
                                    </label><br><br>
                                    <label for="gopay">
                                        <input type="radio" class="form-check-input" id="gopay" value="GOPAY" name="payment">
                                        GOPAY (082395880770) <img src="foto/gopay.png" alt="..." width="45%">
                                    </label><br><br>
                                    <label for="shopeepay">
                                        <input type="radio" class="form-check-input" id="shopeepay" value="SHOPEEPAY" name="payment">
                                        SHOPEEPAY (082395880770) <img src="foto/shopeepay.png" alt="..." width="50%">
                                    </label><br>
                                    <label for="linkaja">
                                        <input type="radio" class="form-check-input" id="linkaja" value="LINK AJA" name="payment">
                                        LINK AJA (082395880770) <img src="foto/linkaja.png" alt="..." width="50%">
                                    </label>
                                </div>
                            </div>
                            <h6>
                                <label for="qris">
                                    <input type="radio" class="form-check-input" id="qris" value="QR CODE" name="payment">
                                    <h6>SCAN QRIS<br></h6>
                                    <img src="foto/barkot.png" alt="barcode" width="40%">
                                </label>
                            </h6>
                            <h5 style="text-align: center; font-weight: bold;">a/n PT SEDEKAH AMAL ONLINE</h5>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-11" style="padding-left: 35%;">
                            <input type="submit" value="KONFIRM PEMBAYARAN" class="btn btn-success" style="width: 50%; font-size: 22px;">
                        </div>
                        <div class="col">
                            <input type="reset" value="reset" class="btn btn-outline-danger">
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
