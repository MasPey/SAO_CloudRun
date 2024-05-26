<?php
session_start();
if (empty($_SESSION['id'])) {
    header("location: login.php?status=notlogin");
}
?>
<html>

<head>
    <title>ADMIN</title>
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

    nav {
        background-image: linear-gradient(to bottom right, white, powderblue);
        border: solid powderblue;
    }

    nav .nav-item {
        border-bottom: solid powderblue;
    }

    .offcanvas {
        background-image: linear-gradient(white, powderblue);
    }

    .nav-link {
        font-weight: bold;
    }

    .data {
        margin-top: 1%;
    }

    .list {
        border-radius: 10px;
        margin-top: 5%;
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

    .card{
        border: solid powderblue 2px; 
    }
</style>

<body>
    <nav class="navbar bg-light sticky-top" style="padding: 2px;">
        <div class="container-fluid">
            <button style="border: solid #22bfbb;" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand col">&emsp;&emsp;<img src="foto/saonav.png" alt="logo" width="30%"></a>
            <a class="navbar-brand" href="logout.php" style="margin: 0%; font-size: 15pt; color: darkslategrey;">Logout</a>
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
                            <a class="nav-link active" href="admin.php">Admin</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Program
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="sedekah.php">Sedekah</a></li>
                                <hr class="dropdown-divider">
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

    <main>
        <div class="data">
            <div class="container">
                <h2 style="text-align: center;">INFO</h2>
                <div class="row">
                    <div class="col card" style="margin: 0% 2%; align-items: center; text-align: center;">
                        <img src="foto/donasi.png" alt="foto" width="50%" style="margin-top: -20%;">
                        <h6>
                            DONASI TERKUMPUL
                            <hr>
                            <?php
                            $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                            $query = mysqli_query($connect, "SELECT SUM(jumlah) AS total FROM donasi");
                            $query2 = mysqli_query($connect, "SELECT SUM(jumlah) AS totals FROM donasi WHERE program='sedekah'");
                            $query3 = mysqli_query($connect, "SELECT SUM(jumlah) AS totalw FROM donasi WHERE program='wakaf'");
                            $data = mysqli_fetch_array($query);
                            $data2= mysqli_fetch_array($query2);
                            $data3= mysqli_fetch_array($query3);
                            ?>
                            <p><?= "SEDEKAH : RP " . $data2['totals'].",00";?></p>
                            <p><?= "WAKAF : RP " . $data3['totalw'].",00";?></p>
                            <p><?= "TOTAL : RP " . $data['total'].",00";?></p>
                        </h6>
                    </div>

                    <div class="col card" style="margin: 0% 2%; align-items: center; text-align: center;">
                        <img src="foto/donatur.png" alt="foto" width="50%" style="margin-top: -20%;">
                        <h6>
                            JUMLAH DONATUR
                            <hr>
                            <?php
                            $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                            $query = mysqli_query($connect, "SELECT * FROM donasi");
                            $donatur = 0;$s=0;$w=0;
                            while ($data = mysqli_fetch_array($query)) {
                                $donatur++;
                                if($data['program']=='sedekah'){
                                    $s++;
                                }else{
                                    $w++;
                                }
                            }
                            ?>
                            <p><?= "SEDEKAH : ".$s." Donatur ";?></p>
                            <p><?= "WAKAF : ".$w." Donatur ";?></p>
                            <p><?= "TOTAL : ".$donatur." Donatur";?></p>
                        </h6>
                    </div>
                    <div class="col-6 card" style="margin: 0% 2%; align-items: center; text-align: center;">
                        <img src="foto/info.png" alt="foto" width="24%" style="margin-top: -6%;">
                        <h6>INFO PROGRAM
                            <hr>
                        </h6>
                        <div class="row" style="margin-top: -2%;">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>SEDEKAH</h6>
                                        <p>
                                            <?php
                                            $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                                            $query = mysqli_query($connect, "SELECT * FROM sedekah");
                                            $i = 0;
                                            while ($data = mysqli_fetch_array($query)) {
                                                if ($i < 2) echo $data['jenis'] . ", ";
                                                $i++;
                                            }
                                            ?>dll.
                                        </p>
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="program" value="sedekah">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    ADD
                                                </button>
                                                <ul class="dropdown-menu" style="width: 250px;">
                                                    <div class="input-group">
                                                        <input type="text" class="dropdown-item form-control" placeholder="Input" name="jenis">
                                                        <button value="0" name="id" type="submit" class="btn btn-outline-success">submit</button>
                                                    </div>
                                                </ul>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">DELETE</button>
                                                <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                                                    $query = mysqli_query($connect, "SELECT * FROM sedekah");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <button type="submit" class="dropdown-item btn btn-outline-danger btn-group" name="id" value="<?= $data['id']; ?>">
                                                            <?= $data['jenis']; ?><br>
                                                            <img src="foto/delete.png" alt="..." width="20%" style="margin-left: 20%;">
                                                        </button>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h6>WAKAF</h6>
                                        <p>
                                            <?php
                                            $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                                            $query = mysqli_query($connect, "SELECT * FROM wakaf");
                                            $i = 0;
                                            while ($data = mysqli_fetch_array($query)) {
                                                if ($i < 2) echo $data['jenis'] . ", ";
                                                $i++;
                                            }
                                            ?>dll.
                                        </p>
                                        <form action="update.php" method="POST">
                                            <input type="hidden" name="program" value="wakaf">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    ADD
                                                </button>
                                                <ul class="dropdown-menu" style="width: 250px;">
                                                    <div class="input-group">
                                                        <input type="text" class="dropdown-item form-control" placeholder="Input" name="jenis">
                                                        <button value="0" name="id" type="submit" class="btn btn-outline-success">submit</button>
                                                    </div>
                                                </ul>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger">DELETE</button>
                                                <button type="button" class="btn btn-outline-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    $connect = new mysqli('34.101.187.105', 'root', '', 'sao');
                                                    $query = mysqli_query($connect, "SELECT * FROM wakaf");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <button type="submit" class="dropdown-item btn btn-outline-danger btn-group" name="id" value="<?= $data['id']; ?>">
                                                            <?= $data['jenis']; ?><br>
                                                            <img src="foto/delete.png" alt="..." width="20%" style="margin-left: 20%;">
                                                        </button> <?php } ?>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="list container text-center" style="background-color: rgba(34, 191, 187, 0.1);">
            <div class="btn-group dropup">
                <button type="button" class="btn btn-success">LIHAT DAFTAR DONASI</button>
                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden"></span>
                </button>
                <form action="admin.php">
                    <ul class="dropdown-menu">
                        <button type="submit" class="dropdown-item" name="program" value="sedekah">SEDEKAH</button>
                        <button type="submit" class="dropdown-item" name="program" value="wakaf">WAKAF</button>
                        <button type="submit" class="dropdown-item" name="program" value="all">ALL</button>
                    </ul>
                </form>
            </div><br>
            <h4 style="text-align: left;">DAFTAR DONASI :</h4>
            <table class="table table-default table-hover table-bordered" style="border: solid #22bfbb 3px;">
                <tr style="text-align: center; color: black;">
                    <th>Id</th>
                    <th>Nama Donatur</th>
                    <th>Kontak</th>
                    <th>Email</th>
                    <th>Catatan</th>
                    <th>Program</th>
                    <th>Jenis</th>
                    <th>Jumlah Donasi</th>
                    <th>Pembayaran</th>
                    <th colspan="2">Status</th>
                </tr>
                <?php
                $url = 'https://sao-cloudrun-q2od2bwu5a-et.a.run.app/api-sao/getdonasi.php';
                $data = [];
                
                // Check if 'program' parameter is set in the URL
                if (isset($_GET['program'])) {
                    $data['program'] = $_GET['program'];
                }
                
                // Initialize cURL session
                $curl = curl_init();
                
                // Set the cURL options
                curl_setopt_array($curl, [
                    CURLOPT_URL => $url . '?' . http_build_query($data), // Append query parameters to the URL
                    CURLOPT_RETURNTRANSFER => true, // Return the response instead of printing it
                    CURLOPT_HEADER => false, // Exclude the header from the output
                    CURLOPT_FOLLOWLOCATION => true, // Follow redirects
                    CURLOPT_MAXREDIRS => 10, // Limit the number of redirects
                ]);
                
                // Execute the cURL request and store the response
                $response = curl_exec($curl);
                
                // Check for errors
                if ($response === false) {
                    // Handle cURL error
                    echo "<tr><td colspan='11'>Error: " . curl_error($curl) . "</td></tr>";
                } else {
                    // Decode the JSON response
                    $data = json_decode($response, true);
                    // echo $response;
                
                    // Check if the response contains 'result' key
                    if (isset($data['result'])) {
                        // Iterate through each data in the 'result' array
                        foreach ($data['result'] as $row) {
                            ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $row['kontak']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['catatan']; ?></td>
                                <td><?= $row['program']; ?></td>
                                <td><?= $row['jenis']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td><?= $row['pembayaran']; ?></td>
                                <td><?= $row['status']; ?></td>
                                <td>
                                    <form action="edit.php" method="POST">
                                        <div class="btn-group dropstart">
                                            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit
                                            </button>
                                            <ul class="dropdown-menu" style="width: 200px;">
                                                <div class="input-group">
                                                    <input type="text" class="dropdown-item form-control" placeholder="Input" name="status">
                                                    <button type="submit" name="id" value="<?= $row['id']; ?>" class="btn btn-outline-warning" style="font-size: 15px;">submit</button>
                                                </div>
                                            </ul>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        // If 'result' key is not found in the response
                        echo "<tr><td colspan='11'>No records found.</td></tr>";
                    }
                }
                
                // Close the cURL session
                curl_close($curl); 
                ?>
            </table>
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