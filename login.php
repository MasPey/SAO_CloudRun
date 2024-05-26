<html>

<head>
	<title>LOGIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
	* {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

	.login {
		margin: 0% 30% 0% 30%;
		padding: 1% 5%;
		background-color: powderblue;
		border: solid #22bfbb;
		border-radius: 3%;
		border-width: 5pt;
	}

	.form-control {
		color: #22bfbb;
		border: #22bfbb solid;
	}

	.form-control:hover {
		font-size: larger;
		transition: 0.5s;
		color: #22bfbb;
	}

	.login:hover {
		background-color: rgba(34, 191, 187, 0.5);
	}
</style>

<body style="margin-top: 7%; background-image: linear-gradient(rgba(34,191,187,0.5),rgba(34,191,187,0.1));">
	<div class="container">
		<div class="login text-center">
			<img src="foto/admin.png" alt="..." width="30%">
			<h1>LOGIN</h1>
			<hr>
			<h6>
				<?php
				if (isset($_GET['status'])) {
					if ($_GET['status'] == "failed") {
						echo "FAILED ! Invalid ID or Password ";
					} else if ($_GET['status'] == "notlogin") {
						echo "LOGIN UNTUK AKSES ADMIN !";
					} else if ($_GET['status'] == "logout") {
						echo "LOGOUT SUCCESSFUL !";
					}
				} else {
					echo "LOGIN UNTUK AKSES ADMIN !";
				}
				?>
			</h6>
			<form action="cek_login.php" method="POST">
				<input type="text" class="form-control" placeholder="Input ID Admin" style="margin-top: 6%;" name="id" required><br>
				<input type="password" class="form-control" placeholder="Input Password" name="pw" required><br>
				<button type="submit" class="btn btn-outline-dark">LOGIN</button>
			</form>
			<img src="foto/saonav.png" alt="foto" width="100%"><br>
		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>