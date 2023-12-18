<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-primary">
							<h3 class="card-title text-white">
								<i class="fa fa-edit"></i> Tambah Data
							</h3>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kepala Keluarga</label>
									<div class="col-sm-6">
										<select name="nama" id="nama" class="form-control select2bs4" required>
											<option selected="selected">- Pilih Kepala Keluarga -</option>
											<?php
											// ambil data dari database
											$query = "select * from tb_kk";
											$hasil = mysqli_query($koneksi, $query);
											while ($row = mysqli_fetch_array($hasil)) {
											?>
												<option value="<?php echo $row['kepala'] ?>">
													<?php echo $row['no_kk'] ?>
													-
													<?php echo $row['kepala'] ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Keluarga</label>
									<div class="col-sm-6">
										<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
											<option selected="selected">- Pilih KK -</option>
											<?php
											// ambil data dari database
											$query = "select * from tb_kk";
											$hasil = mysqli_query($koneksi, $query);
											while ($row = mysqli_fetch_array($hasil)) {
											?>
												<option value="<?php echo $row['id_kk'] ?>">
													<?php echo $row['no_kk'] ?>
													-
													<?php echo $row['kepala'] ?>
												</option>
											<?php
											}
											?>
										</select>
									</div>
								</div>



								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Bulan</label>
									<div class="col-sm-6">
										<select name="bulan" id="bulan" class="form-control">
											<option>- Pilih -</option>
											<option>Januari</option>
											<option>Februari</option>
											<option>Maret</option>
											<option>April</option>
											<option>Mei</option>
											<option>Juni</option>
											<option>Juli</option>
											<option>Agustus</option>
											<option>September</option>
											<option>Oktober</option>
											<option>November</option>
											<option>Desember</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
									<div class="col-sm-3">
										<input type="date" class="form-control" id="tgl" name="tgl" required>
									</div>
								</div>


								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Biaya Wifi</label>
									<div class="col-sm-6">
										<input type="number" class="form-control" id="iuran_aman" name="iuran_aman" placeholder="Biaya Wifi" required>
									</div>
								</div>

							</div>
							<div class="card-footer">
								<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
								<a href="?page=data-iuran" title="Kembali" class="btn btn-danger">Batal</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // Mendapatkan nilai input iuran_aman
    $iuran_aman = $_POST['iuran_aman'];

    // Menentukan nilai keterangan
    $ket = ($iuran_aman >= 75000) ? "Lunas" : "Belum";

    // Mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_iuran (id_kk, nama, iuran_aman, bulan, tgl, ket) VALUES (
        '" . $_POST['id_kk'] . "',
        '" . $_POST['nama'] . "',
        '" . $iuran_aman . "',
        '" . $_POST['bulan'] . "',
        '" . $_POST['tgl'] . "',
        '" . $ket . "'
    )";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);

    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-iuran';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-iuran';
                }
            });
        </script>";
    }
}

