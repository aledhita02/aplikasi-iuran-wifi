<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: home.php");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "inc/koneksi.php";
?>

<!-- fungsi untuk menambahkan title sesuai menu ketika di click -->
<?php
$judul = "Dashboard";
if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case 'data-pengguna':
			$judul = "Setting User";
			break;
		case 'add-pengguna':
			$judul = "Add User";
			break;
		case 'edit-pengguna':
			$judul = "Edit User";
			break;

			//kartu KK
		case 'data-kartu':
			$judul = "Data Kartu Keluarga";
			break;
		case 'add-kartu':
			$judul = "Tambah Kartu Keluarga";
			break;
		case 'edit-kartu':
			$judul = "Edit Kartu Keluarga";
			break;
		case 'anggota':
			$judul = "Tambah Anggota Keluarga";
			break;


			//pengumuman
		case 'data_pengu':
			$judul = "Pengumuman";
			break;
		case 'add_pengu':
			$judul = "Tambah Pengumuman";
			break;
		case 'edit_pengu':
			$judul = "Edit Pengumuman";
			break;

			//penduduk
		case 'data-pend':
			$judul = "Data Penduduk";
			break;
		case 'add-pend':
			$judul = "Tambah Data Penduduk";
			break;
		case 'edit-pend':
			$judul = "Edit Data Penduduk";
			break;
		case 'view-pend':
			$judul = "Detail Data Penduduk";
			break;

			//suket
		case 'suket-domisili':
			$judul = "Surat Domisili";
			break;
		case '':
			include "surat/suket_domisili.php";
			break;
		case 'data-edit':
			include "admin/edit/data_edit.php";
			break;

			//Iuran
		case 'data-iuran':
			$judul = "Data Iuran Bulanan";
			break;
		case 'add-iuran':
			$judul = "Tambah Data Iuran Bulanan";
			break;
		case 'edit-iuran':
			$judul = "Edit Data Iuran Bulanan";
			break;
		case 'view-iuran':
			$judul = "Detail Data Iuran Bulanan";
			break;
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $judul; ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/web/img/izin.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icons -->
	<link href="assets/bizpage/img/rt.png" rel="icon">


	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style>
		/* CSS untuk dark mode */
		body.dark-mode {
			background-color: #111;
			color: #fff;
		}

		body.dark-mode button.btn-primary {
			background-color: #4e4e4e;
			color: #fff;
		}
	</style>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/azzara.min.css">

	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</head>

<body class="hold-transition sidebar-mini ">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="index.html" class="logo">
					<img src="assets/img/logo rt1.png" alt="navbar brand" class="navbar-brand">
				</a>
				<h3 class="logo text-white mt-4">Laskar Online</h3>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg g">

				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item d-none d-sm-inline-block">
							<a href="index.php" class="nav-link mt-2">
								<font color="white">
									<h3><b>LASKAR ONLINE</b></h3>
								</font>
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<div class="sidebar">

				<div class="sidebar-background"></div>
				<div class="sidebar-wrapper scrollbar-inner">
					<div class="sidebar-content">
						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<div class="user">
								<div class="avatar-sm float-left mr-2">
									<img src="assets/img/profile.png" alt="..." class="avatar-img rounded-circle">
								</div>
								<div class="info">
									<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
										<span>
											<?php echo $data_nama; ?>
											<span class="user-level"><?php echo $data_level; ?></span>
										</span>
									</a>
									<div class="clearfix"></div>
								</div>
							</div>
							<ul class="nav">


								<li class="nav-item">
									<a href="index.php">
										<i class="fas fa-home"></i>
										<p>Dashboard</p>
									</a>
								</li>

								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Menu</h4>
								</li>

								<li class="nav-item">
									<a href="?page=data-pengu">
										<i class="fas fa-pen-square"></i>
										<p>Jadwal Pengumuman</p>
									</a>
								</li>

								<li class="nav-item">
									<a data-toggle="collapse" href="#base">
										<i class="fas fa-chart-pie"></i>
										<p>Sirkulasi Penduduk</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="base">
										<ul class="nav nav-collapse">
											<li>
												<a href="?page=data-pend">
													<span class="sub-item">Data Penduduk</span>
												</a>
											</li>
											<li>
												<a href="?page=data-kartu">
													<span class="sub-item">Data KK</span>
												</a>
											</li>
										</ul>
									</div>
								</li>

								<li class="nav-item">
									<a data-toggle="collapse" href="#forms">
										<i class="fas fa-credit-card"></i>
										<p>Iuran Bulanan</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="forms">
										<ul class="nav nav-collapse">
											<li>
												<a href="?page=data-iuran">
													<span class="sub-item">Iuran WIfi</span>
												</a>
											</li>
										</ul>
									</div>
								</li>


								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
									<h4 class="text-section">Setting</h4>
								</li>

								<li class="nav-item">
									<a href="?page=data-pengguna">
										<i class="fas fa-user"></i>
										<p>User</p>
									</a>
								</li>

							<?php
						} elseif ($data_level == "User") {
							?>
								<div class="user">
									<div class="avatar-sm float-left mr-2">
										<img src="assets/img/user.png" alt="..." class="avatar-img rounded-circle">
									</div>
									<div class="info">
										<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
											<span>
												<?php echo $data_nama; ?>
												<span class="user-level"><?php echo $data_level; ?></span>
											</span>
										</a>
										<div class="clearfix"></div>
									</div>
								</div>
								<ul class="nav">

									<li class="nav-item active">
										<a href="index.php">
											<i class="fas fa-home"></i>
											<p>Dashboard</p>
										</a>
									</li>

									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">Menu</h4>
									</li>

									<li class="nav-item">
										<a data-toggle="collapse" href="#base">
											<i class="fas fa-layer-group"></i>
											<p>Sirkulasi Penduduk</p>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="base">
											<ul class="nav nav-collapse">
												<li>
													<a href="?page=data-pend">
														<span class="sub-item">Data Penduduk</span>
													</a>
												</li>
												<li>
													<a href="?page=data-kartu">
														<span class="sub-item">Data KK</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

									<li class="nav-item">
										<a data-toggle="collapse" href="#forms">
											<i class="fas fa-pen-square"></i>
											<p>Iuran Bulanan</p>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="forms">
											<ul class="nav nav-collapse">
												<li>
													<a href="?page=data-iuran">
														<span class="sub-item">Iuran WIfi</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

									<li class="nav-section">
										<span class="sidebar-mini-icon">
											<i class="fa fa-ellipsis-h"></i>
										</span>
										<h4 class="text-section">Setting</h4>
									</li>
							<?php
						}
							?>

							<li class="nav-item">
								<a href="logout.php">
									<i class="fas fa-arrow-circle-left"></i>
									<p>Logout</p>
								</a>
							</li>

							</ul>
					</div>
				</div>
			</div>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//kartu KK
							case 'data-kartu':
								include "admin/kartu/data_kartu.php";
								break;
							case 'add-kartu':
								include "admin/kartu/add_kartu.php";
								break;
							case 'edit-kartu':
								include "admin/kartu/edit_kartu.php";
								break;
							case 'anggota':
								include "admin/kartu/anggota.php";
								break;
							case 'del-anggota':
								include "admin/kartu/del_anggota.php";
								break;
							case 'del-kartu':
								include "admin/kartu/del_kartu.php";
								break;

								//pengumuman
							case 'data-pengu':
								include "admin/pengu/data_pengu.php";
								break;
							case 'add_pengu':
								include "admin/pengu/add_pengu.php";
								break;
							case 'edit_pengu':
								include "admin/pengu/edit_pengu.php";
								break;
							case 'del_pengu':
								include "admin/pengu/del_pengu.php";
								break;

								//penduduk
							case 'data-pend':
								include "admin/pend/data_pend.php";
								break;
							case 'add-pend':
								include "admin/pend/add_pend.php";
								break;
							case 'edit-pend':
								include "admin/pend/edit_pend.php";
								break;
							case 'del-pend':
								include "admin/pend/del_pend.php";
								break;
							case 'view-pend':
								include "admin/pend/view_pend.php";
								break;

								//Iuran
							case 'data-iuran':
								include "admin/iuran/data_iuran.php";
								break;
							case 'add-iuran':
								include "admin/iuran/add_iuran.php";
								break;
							case 'edit-iuran':
								include "admin/iuran/edit_iuran.php";
								break;
							case 'del-iuran':
								include "admin/iuran/del_iuran.php";
								break;
							case 'view-iuran':
								include "admin/iuran/view_iuran.php";
								break;

								//default
							default:
								echo "<center><h1> Menu ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "User") {
							include "home/user.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank">
					<strong> Alpraz</strong>
				</a>
				All rights reserved.
			</div>
			<b>Version 1.0</b>
		</footer>

	</div>
	<!-- ./wrapper -->

	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="assets/js/plugin/gmaps/gmaps.js"></script>

	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Azzara JS -->
	<script src="assets/js/ready.min.js"></script>

	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	<!-- //fungsi untuk mennambahkan dark-mode -->
	<script>
		// Mengubah mode ke dark mode
		function enableDarkMode() {
			document.body.classList.add('dark-mode');
		}

		// Mengubah mode ke light mode
		function disableDarkMode() {
			document.body.classList.remove('dark-mode');
		}
	</script>

</body>

</html>