<?php

$sql = $koneksi->query("SELECT COUNT(id_pend) as pend  from tb_pdd where status='Ada'");
while ($data = $sql->fetch_assoc()) {
	$pend = $data['pend'];
}

$sql = $koneksi->query("SELECT COUNT(id_kk) as kartu  from tb_kk");
while ($data = $sql->fetch_assoc()) {
	$kartu = $data['kartu'];
}

$sql = $koneksi->query("SELECT COUNT(id_iuran) as iuran from tb_iuran ");
while ($data = $sql->fetch_assoc()) {
	$iuran = $data['iuran'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengu) as pengu from tb_pengu ");
while ($data = $sql->fetch_assoc()) {
	$pengu = $data['pengu'];
}

?>


<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="row">

						<!-- card -->
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-danger bubble-shadow-small">
												<i class="flaticon-database"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category"><b>Data Penduduk</b></p>
												<h4 class="card-title"><?php echo $pend; ?></h4>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer bg-light">
									<div class="row">
										<div class="col text-right">
											<a href="index.php?page=data-pend" class="small-box-footer" style="text-decoration: none;">
												Selengkapnya <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- card -->
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-success bubble-shadow-small">
												<i class="flaticon-file-1"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category"><b>Data Kartu Keluarga</b></p>
												<h4 class="card-title"><?php echo $kartu; ?></h4>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer bg-light">
									<div class="row">
										<div class="col text-right">
											<a href="index.php?page=data-pend" class="small-box-footer" style="text-decoration: none;">
												Selengkapnya <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- card -->
						<div class="col-sm-6 col-md-4">
							<div class="card card-stats card-round">
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-icon">
											<div class="icon-big text-center icon-warning bubble-shadow-small">
												<i class="flaticon-wifi"></i>
											</div>
										</div>
										<div class="col col-stats ml-3 ml-sm-0">
											<div class="numbers">
												<p class="card-category"><b>Data Pembayaran Wifi</b></p>
												<h4 class="card-title"><?php echo $iuran; ?></h4>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer bg-light">
									<div class="row">
										<div class="col text-right">
											<a href="index.php?page=data-pend" class="small-box-footer" style="text-decoration: none;">
												Selengkapnya <i class="fas fa-arrow-circle-right"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>