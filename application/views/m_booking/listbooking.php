<div class="dashboard-ecommerce" style="
    min-height: 565px;">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar Booking </h2>
          <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('booking'); ?>" class="breadcrumb-link">Booking</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Booking</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="ecommerce-widget">
      <div class="row">
        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- recent orders  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <h5 class="card-header">Booking kendaraan yang masuk</h5>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                      <th class="border-0 centerHorizontal" style="width:20px">No</th>
                      <th class="border-0">Nama Penyewa</th>
                      <th class="border-0">Kode Booking</th>
                      <th class="border-0">Tanggal Sewa</th>
                      <th class="border-0">Tanggal Kembali</th>
                      <th class="border-0">Biaya</th>
                      <th class="border-0">Status</th>
                      <th class="border-0 text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if(isset($data['page'])){
                      $no = $data['page']*4-4;
                    } else {
                      $no = 0;
                    }
                    foreach ($data['booking'] as $k => $booking) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td>
                          <?= $booking->nama_lengkap ?>
                        </td>
                        <td>
                          <?= $booking->kode_booking ?>
                        </td>
                        <td>
                          <?= $booking->begin_date ?>
                        </td>
                        <td>
                          <?= $booking->due_date ?>
                        </td>
                        <td>
                          Rp. <?= number_format($booking->biaya,2,',','.') ?>
                        </td>
                        <td>
                          <?php
                          $s = 0;
                            if($booking->confirmed == "Y"){
                              echo "Diterima";
                            } else {
                              if($booking->deleted_at != ""){
                                echo "Ditolak";
                              } else {
                                echo "Belum dikonfirmasi";
                              }
                            }
                           ?>
                        </td>
                        <td class="text-center">
                          <a class="btn btn-success" href="<?= base_url()."booking/detail/".$booking->id_booking; ?>">
                            <i class="fas fa-search"></i>
                          </a> &nbsp;&nbsp;
                          <?php
                            if($booking->deleted_at == "" && $booking->confirmed == "N"){
                              ?>
                              <a href="#" class="btn btn-brand" onclick="redirectMessage('<?= base_url()."booking/konfirmasi?id=".$booking->id_booking."&status=1"; ?>', 'Apakah Anda yakin ingin mengkonfirmasi booking ini')">
                                konfirmasi
                              </a>&nbsp;&nbsp;
                              <a href="#" class="btn btn-danger" onclick="redirectMessage('<?= base_url()."booking/konfirmasi?id=".$booking->id_booking."&status=2"; ?>', 'Apakah Anda yakin ingin menolak booking ini')">
                                Tolak
                              </a>
                              <?php
                            }
                          ?>
                        </td>
                      </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <nav aria-label="Page navigation">
                  <ul class="pagination">
                    <?php
                    if($data['jumlah']>1){
                      for($i=1;$i<=$data['jumlah'];$i++){
                        if(isset($data['page'])){
                          if($data['page']==$i){
                            echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
                          }else{
                            echo "<li class='page-item'><a class='page-link' href='?p=".$i."'>".$i."</a></li>";
                          }
                        }else{
                          if($i==1){
                            echo '<li class="active page-item"><a class="page-link">'.$i.'</a></li>';
                          }else{
                            echo "<li class='page-item'><a class='page-link' href='?p=".$i."'>".$i."</a></li>";
                          }
                        }
                      }
                    }
                    ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
