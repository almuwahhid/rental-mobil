<div class="dashboard-ecommerce" style="
    min-height: 565px;">
  <div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title">Daftar User </h2>
          <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('user') ?>" class="breadcrumb-link">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">List User</li>
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
            <h5 class="card-header">List User</h5>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-light">
                    <tr class="border-0">
                      <th class="border-0 centerHorizontal" style="width:20px">No</th>
                      <th class="border-0">Email</th>
                      <th class="border-0">Nama Lengkap</th>
                      <th class="border-0">Pekerjaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($data as $k => $user) { ?>
                      <tr>
                        <td class="centerHorizontal text-center">
                          <?= ++$no;?>
                        </td>
                        <td>
                          <?= $$user->username ?>
                        </td>
                        <td>
                          <?= $user->nama_lengkap ?>
                        </td>
                        <td>
                          <a href='<?= base_url()."/user/detail/".$user->username; ?>'>
                            <i class="fas fa-edit"></i>
                          </a> &nbsp;&nbsp;
                          <?php
                            if($user->aktif == 'N'){
                              ?>
                                <a class="btn btn-brand" href="<?= base_url()."/user/konfirmasi?username=".$user->username; ?>">
                                  konfirmasi
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
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
