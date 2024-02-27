<div class="content-wrapper">
  <div class="container-full">
    <section class="content">
      <div class="row align-items-end">
        <div class="col-xl-9 col-12">
          <div class="box bg-primary-light pull-up">
            <div class="box-body p-xl-0">
              <div class="row align-items-center">
                <div class="col-12 col-lg-3"><img src="images/svg-icon/color-svg/custom-14.svg" alt=""></div>
                <div class="col-12 col-lg-9">
                  <h2>Selamat datang Admin <br><?php echo $u_Nama_Lengkap; ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-12">
          <div class="box bg-transparent no-shadow">
            <div class="box-body p-xl-0 text-center">
              <h3 class="px-30 mb-20">Apakah ada Artikel baru?</h3>
              <a href="?menu=dashboard_admin_try_out_master&tambah" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Buat Artikel </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-xl-12 col-12">
              <div class="row">

                <div class="col-xl-4 col-lg-4 col-12">
                  <div class="box" style="min-height:550px;">
                    <div class="box-header">
                      <h4 class="box-title">Summary</h4>
                      <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                        View All
                      </a>
                    </div>
                    <div class="box-body">
                      <a href="?menu=dashboard_admin_histori_saldo_master" class="box bg-danger bg-hover-danger pull-up">
                        <div class="box-body">
                          <div class="d-flex align-items-center">
                            <span class="text-white mdi mdi-credit-card-multiple fs-36"><span class="path1"></span><span class="path2"></span></span>
                            <div class="ms-20">
                              <h4 class="text-white mb-0">0 </h4>
                              <h5 class="text-white-50 mb-0">Total Uang yang Masuk</h5>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="?menu=dashboard_admin_data_siswa" class="box bg-primary bg-hover-primary pull-up">
                        <div class="box-body">
                          <div class="d-flex align-items-center">
                            <span class="text-white mdi mdi-account-convert fs-36"></span>
                            <div class="ms-20">
                              <h4 class="text-white mb-0">0 </h4>
                              <h5 class="text-white-50 mb-0">Total Siswa</h5>
                            </div>
                          </div>
                        </div>
                      </a>

                      <a href="?menu=dashboard_admin_data_marketing" class="box bg-success bg-hover-success pull-up">
                        <div class="box-body">
                          <div class="d-flex align-items-center">
                            <span class="text-white mdi mdi-account-multiple-plus fs-36"></span>
                            <div class="ms-20">
                              <h4 class="text-white mb-0">0 </h4>
                              <h5 class="text-white-50 mb-0">Total Marketing</h5>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-12">
                  <div class="box" style="min-height:550px;">
                    <div class="box-header">
                      <h4 class="box-title">Top 5 Siswa</h4>
                      <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=dashboard_admin_data_siswa">
                        View All
                      </a>
                    </div>
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                          <thead>
                            <tr>
                              <th style="width: 5%;">No</th>
                              <th style="width: 45%;">Nama Siswa</th>
                              <th style="width: 55%;">Try Out yang diikuti</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> xxx </td>
                              <td> xxx </td>
                              <td> xxx </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-12">
                  <div class="box" style="min-height:550px;">
                    <div class="box-header">
                      <h4 class="box-title">Top 5 Referal</h4>
                      <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=dashboard_admin_data_marketing">
                        View All
                      </a>
                    </div>
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Marketing</th>
                              <th>Jumlah Siswa</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
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

        </div>
      </div>
    </section>
  </div>
</div>