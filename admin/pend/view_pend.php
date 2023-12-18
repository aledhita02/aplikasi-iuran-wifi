<?php

if (isset($_GET['kode'])) {
	$sql_cek = "SELECT * from tb_pdd where id_pend ='" . $_GET['kode'] . "'";
	$query_cek = mysqli_query($koneksi, $sql_cek);
	$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}

?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-info">
							<h3 class="card-title text-white">
								<i class="fa fa-user"></i> Detail Penduduk
							</h3>
							</h3>
							<div class="card-tools">
							</div>
						</div>
						<div class="card-body p-0">
							<table class="table">
								<tbody>
									<tr>
										<td style="width: 150px">
											<b>NIK</b>
										</td>
										<td>:
											<?php echo $data_cek['nik']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Nama</b>
										</td>
										<td>:
											<?php echo $data_cek['nama']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>TTL</b>
										</td>
										<td>:
											<?php echo $data_cek['tempat_lh']; ?>
											/
											<?php echo date("d F Y", strtotime($data_cek['tgl_lh'])); ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Jenis Kelamin</b>
										</td>
										<td>:
											<?php echo $data_cek['jekel']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Alamat</b>
										</td>
										<td>:
											<?php echo $data_cek['alamat']; ?>, Desa
											<?php echo $data_cek['desa']; ?>, RT
											<?php echo $data_cek['rt']; ?>/ RW
											<?php echo $data_cek['rw']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Agama</b>
										</td>
										<td>:
											<?php echo $data_cek['agama']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Status Kawin</b>
										</td>
										<td>:
											<?php echo $data_cek['kawin']; ?>
										</td>
									</tr>
									<tr>
										<td style="width: 150px">
											<b>Pekerjaan</b>
										</td>
										<td>:
											<?php echo $data_cek['pekerjaan']; ?>
										</td>
									</tr>


								</tbody>
							</table>
							<div class="card-footer">
								<a href="?page=data-pend" class="btn btn-info">Kembali</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>