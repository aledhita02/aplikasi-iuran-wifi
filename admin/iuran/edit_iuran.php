<?php
if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_iuran WHERE id_iuran='" . $_GET['kode'] . "'";
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
                        <div class="card-header bg-success">
                            <h3 class="card-title text-white"><i class="fa fa-edit"></i> Tambah Data</h3>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo isset($data_cek['nama']) ? $data_cek['nama'] : ''; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Keluarga</label>
                                    <div class="col-sm-6">
                                        <select name="id_kk" id="id_kk" class="form-control select2bs4" required>
                                            <option selected="selected">- Pilih KK -</option>
                                            <?php
                                            // ambil data dari database
                                            $query = "SELECT * FROM tb_kk";
                                            $hasil = mysqli_query($koneksi, $query);
                                            while ($row = mysqli_fetch_array($hasil)) {
                                                $selected = ($data_cek['id_kk'] == $row['id_kk']) ? 'selected' : '';
                                                echo "<option value='" . $row['id_kk'] . "' " . $selected . ">" . $row['no_kk'] . " - " . $row['kepala'] . "</option>";
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
                                            <?php
                                            $bulan_arr = array(
                                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                            );

                                            foreach ($bulan_arr as $bulan) {
                                                $selected = (isset($data_cek['bulan']) && $data_cek['bulan'] == $bulan) ? 'selected' : '';
                                                echo "<option value='$bulan' $selected>$bulan</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Pembayaran</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="tgl" name="tgl" value="<?php echo isset($data_cek['tgl']) ? $data_cek['tgl'] : ''; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Biaya Wifi</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" id="iuran_aman" name="iuran_aman" placeholder="Biaya Keamanan" value="<?php echo isset($data_cek['iuran_aman']) ? $data_cek['iuran_aman'] : ''; ?>" required>
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="id_iuran" value="<?php echo $_GET['kode']; ?>">
                                <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
                                <a href="?page=data-iuran" title="Kembali" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>

                    <?php

                    if (isset($_POST['Ubah'])) {
                        // Mendapatkan nilai input iuran_aman
                        $iuran_aman = $_POST['iuran_aman'];

                        // Menentukan nilai keterangan
                        $ket = ($iuran_aman >= 75000) ? "Lunas" : "Belum";

                        $sql_ubah = "UPDATE tb_iuran SET 
                            id_kk='" . $_POST['id_kk'] . "',
                            bulan='" . $_POST['bulan'] . "',
                            tgl='" . $_POST['tgl'] . "',
                            nama='" . $_POST['nama'] . "',
                            iuran_aman='" . $iuran_aman . "',
                            ket='" . $ket . "'
                            WHERE id_iuran='" . $_POST['id_iuran'] . "'";
                        $query_ubah = mysqli_query($koneksi, $sql_ubah);
                        mysqli_close($koneksi);

                        if ($query_ubah) {
                            echo "<script>
            Swal.fire({
                title: 'Edit Data Berhasil',
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
                title: 'Edit Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-iuran';
                }
            });
        </script>";
                        }
                    }

                    ?>