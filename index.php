<html>

<head>
    <title>HOME</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    * {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .home1 {
        background-image: url('foto/bghome.jpg');
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 100%;
        padding-top: 27%;
        text-align: center;
        font-weight: bold;
        color: white;
    }

    .btnhome {
        color: white;
        font-size: 22px;
        background-color: transparent;
        font-weight: bold;
        padding: 2% 40%;
        border-radius: 10px;
        border: solid lightblue 5px;
    }

    .btnhome:hover {
        transition: 0.5s;
        background-color: powderblue;
        color: darkslategray;
        font-size: 25px;
        border: #22bfbb solid 10px;
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

    .btns {
        border: solid #22bfbb;
        border-radius: 10px;
        color: darkslategray;
        font-size: 25px;
        background-color: lightblue;
        font-weight: bolder;
        padding: 1% 10%;
    }

    .btns:hover {
        background-color: rgba(34, 191, 187, 0.5);
        font-size: 28px;
        transition: 0.5s;
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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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

    <main>
        <div class="home1">
            <div class="container text-center">
                <div class="row">
                    <div class="col" style="padding: 0% 3% 0% 0%;">
                        <a href="#sedekah"><button type="button" class="btnhome">SEDEKAH</button></a>
                    </div>
                    <div class="col" style="padding: 0% 0% 0% 3%;">
                        <a href="#wakaf"><button type="button" class="btnhome">WAKAF</button></a>
                    </div>

                </div>
            </div>
            <h1>
                SEDEKAH AMAL ONLINE [SAO]<br>
                TOP UP PAHALA DENGAN MUDAH BERSAMA SAO
            </h1>
        </div>
        
        <div>
            <div class="container">
                <div class="row" id="sedekah">
                    <div class="col text-center" style="background-color: rgba(34,191,187,0.5); padding: 70px; ">
                        <img src="foto/1.jpg" style="width: 400px; margin-left: 0px; border-radius: 10px; border-right: solid black 6px; border-bottom: solid black 6px;">
                    </div>
                    <div class="col" style="padding: 70px;">
                        <h4 style="font-weight: bold;">SEDEKAH ITU INDAH :)</h4><br>
                        <h6>SAO menyalurkan donasi dan bantuan untuk berbagai jenis program mulai sosial, kesehatan, pendidikan, dll.</h6><br>
                        <a href="sedekah.php" target="blank"><button type="button" class="btns">GAS SEDEKAH</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row" id="wakaf">
                    <div class="col" style="padding: 70px;">
                        <h4 style="font-weight: bold;">WAKAF SEKALI PAHALA ABADI :)</h4><br>
                        <h6>Manusia paling bahagia ialah manusia yang tidak berhenti pahalanya meskipun sudah berhenti nafasnya. Segera wakaf sebelum wafat !</h6><br>
                        <a href="wakaf.php"><button type="button" class="btns">GAS WAKAF</button></a>
                    </div>
                    <div class="col text-center" style="background-color: rgba(34,191,187,0.5); padding: 70px;">
                        <img src="foto/2.jpg" style="width: 400px; margin-left: 0px; border-radius: 10px; border-left: solid black 6px; border-top: solid black 6px;">
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleDark" class="carousel slide container bg-dark" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="bg-dark" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner bg-dark">
                <div class="carousel-item active" data-bs-interval="3500">
                    <img src="foto/thx1.png" class="d-block w-100" alt="foto" style="opacity: 30%;">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Pray For Palestina</h3>
                        <a href="sedekah.php"><button class="btn btn-outline-dark">SEDEKAH</button></a>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="3500">
                    <img src="foto/thx2.png" class="d-block w-100" alt="foto" style="opacity: 30%;">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(255,255,255,0.7); border-radius: 10px; color: black;">
                        <h3 style="font-weight: bold;">Wakaf Untuk Umat</h3>
                        <a href="wakaf.php"><button class="btn btn-outline-dark">WAKAF</button></a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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