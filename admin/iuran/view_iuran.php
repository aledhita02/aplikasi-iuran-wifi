<?php

if (isset($_GET['kode'])) {
  $sql_cek = "SELECT * from tb_iuran where id_iuran ='" . $_GET['kode'] . "'";
  $query_cek = mysqli_query($koneksi, $sql_cek);
  $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
} {
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
                <i class="fa fa-user"></i> Detail Iuran Bulanan
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
                      <b>Nama</b>
                    </td>
                    <td>:
                      <?php echo isset($data_cek['nama']) ? $data_cek['nama'] : ''; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 150px">
                      <b>Bulan Pembayaran</b>
                    </td>
                    <td>:
                      <?php echo isset($data_cek['bulan']) ? $data_cek['bulan'] : ''; ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 150px">
                      <b>Tanggal Pembayaran</b>
                    </td>
                    <td>:
                      <?php echo date("d F Y", strtotime($data_cek['tgl'])); ?>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 150px">
                      <b>Keterangan</b>
                    </td>
                    <td>
                      <div class="row">
                        :
                        <div class="col">
                          <?php

                          if ($data_cek['ket'] == 'Lunas') {
                            echo '<h5><span class="badge badge-pill badge-success ">' . $data_cek['ket'] . '</span></h5>';
                          } else {
                            echo '<h5><span class="badge badge-pill badge-danger">' . $data_cek['ket'] . '</span></h5>';
                          }

                          ?>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

              <!-- Card With Icon States Background -->
              <div class="row">
                <div class="col-sm-6 col-md-3">
                  <div class="card card-stats card-round">
                    <div class="card-body ">
                      <div class="row align-items-center">
                        <div class="col-icon">
                          <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="flaticon-users"></i>
                          </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                          <div class="numbers">
                            <p class="card-category">Total Pembayaran</p>
                            <h4 class="card-title">Rp <?php echo isset($data_cek['iuran_aman']) ? number_format($data_cek['iuran_aman'], 0, ',', '.') : ''; ?></h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <a href="?page=data-iuran" class="btn btn-info">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>