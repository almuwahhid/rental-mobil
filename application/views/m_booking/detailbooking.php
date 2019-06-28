<div class="dashboard-ecommerce">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><?= $data->merk_kendaraan ?> | <?= $data->kode_booking ?></h2>
          <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('booking') ?>" class="breadcrumb-link">Booking</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data->merk_kendaraan ?> | <?= $data->kode_booking ?></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="ecommerce-widget">
      <div class="row">
        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- recent orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <h5 class="card-header">Detail!</h5>
            <div class="card-body">
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="col">Kode Booking</th>
                    <td><?= $data->kode_booking ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Status Booking</th>
                    <td><?php
                    if($data->konfirmasi == "Y"){
                      echo "Diterima";
                    } else {
                      if($data->deleted_at != ""){
                        echo "Ditolak";
                      } else {
                        echo "Belum dikonfirmasi";
                      }
                    }
                    ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Nama Penyewa</th>
                    <td><?= $data->nama_lengkap ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Kendaraan yang disewa</th>
                    <td><?= $data->merk_kendaraan ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Tanggal Pinjam</th>
                    <td><?= $data->tanggal_mulai ?></td>

                  </tr>
                  <tr>
                    <th scope="col">Tanggal Kembali</th>
                    <td><?= $data->tanggal_berakhir ?></td>

                  </tr>
                  <tr>
                    <th scope="col">Jaminan</th>
                    <td><?= $data->jaminan ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Biaya</th>
                    <td>Rp. <?= number_format($data->biaya,2,',','.') ?></td>
                  </tr>
                  <tr>
                    <th scope="col">Foto Konfirmasi Pembayaran</th>
                    <td><?php
                      if($data->konfirmasi_foto == ""){
                        echo "Belum ada Foto yang diupload";
                      } else {
                        ?>
                        <img src="<?= base_url().'/confirm/'.$data->konfirmasi_foto?>" alt="user" class="rounded" width="400">
                        <?php
                      }
                    ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
