<?php
include "inc/koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- icons -->
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">

	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</head>

<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Login</h3>
			<form action="" method="post">
				<div class="login-form">
					<div class="form-group form-floating-label">
						<input class="form-control" id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input class="form-control" id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<a href="#" class="btn" onclick="togglePasswordVisibility()">
								<span id="passwordToggle" class="fas fa-eye"></span>
							</a>
						</div>

					</div>
					<div class="col-4 mx-auto">
						<button type="submit" class="btn btn-primary btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
							<b>Login</b>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- /.login-box -->

	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/ready.js"></script>

	<script>
		function togglePasswordVisibility() {
			var passwordInput = document.getElementsByName('password')[0];
			var passwordToggle = document.getElementById('passwordToggle');

			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				passwordToggle.classList.remove('fa-eye');
				passwordToggle.classList.add('fa-eye-slash');
			} else {
				passwordInput.type = 'password';
				passwordToggle.classList.remove('fa-eye-slash');
				passwordToggle.classList.add('fa-eye');
			}
		}
	</script>

</body>

</html>

<?php


if (isset($_POST['btnLogin'])) {
	//anti inject sql
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login == 1) {
		session_start();
		$_SESSION["ses_id"] = $data_login["id_pengguna"];
		$_SESSION["ses_nama"] = $data_login["nama_pengguna"];
		$_SESSION["ses_username"] = $data_login["username"];
		$_SESSION["ses_password"] = $data_login["password"];
		$_SESSION["ses_level"] = $data_login["level"];

		echo "<script>
            Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index.php';}
            })</script>";
	} else {
		echo "<script>
            Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'login.php';}
            })</script>";
	}
}
