<div class="dashboard-ecommerce">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Tambah Tarif Kendaraan </h2>
          <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Tarif Kendaraan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Tarif Kendaraan</li>
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
            <h5 class="card-header">Masukkan seluruh data dengan benar!</h5>
            <?php
                  if(($this->session->flashdata('alert')) !== null){
                      $message = $this->session->flashdata('alert');
                      $this->load->view('bodyview/alert', ['class' => $message['class'], 'message' => $message['message']]);
                  }
              ?>
            <div class="card-body">
              <form action="<?=base_url('tarif/simpan')?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="tambah">
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Tipe Kendaraan</label>
                  <input required name="tipe_kendaraan" id="inputText3" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Nama Merk Kendaraan</label>
                  <input required name="merk_kendaraan" id="inputText3" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="inputText3" class="col-form-label">Tarif Kendaraan</label>
                  <input required name="tarif_kendaraan" id="tarif_kendaraan" type="text" class="uang form-control">
                </div>
                <div class="custom-file mb-3">
                  <input type="submit" href="#" class="centerHorizontal btn btn-primary" value="Tambahkan"></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
