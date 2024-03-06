<div class="content-wrapper">
  <div class="container-full">
    <section class="content">
      <div class="row align-items-end">
        <div class="col-xl-12 col-12">
          <div class="box bg-primary-light pull-up">
            <div class="box-body p-xl-0">
              <div class="row align-items-center">
                <div class="col-12 col-lg-3"><img src="images/svg-icon/color-svg/custom-14.svg" alt=""></div>
                <div class="col-12 col-lg-9">
                  <h1>Selamat datang <b><?php echo $u_Nama_Lengkap; ?></b></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-12 d-none">
          <div class="box bg-transparent no-shadow">
            <div class="box-body p-xl-0 text-center">
              <h3 class="px-30 mb-20">Apakah ada Artikel baru?</h3>
              <a href="?menu=artikel&tambah" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Buat Artikel </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">


        <div class="col-xl-4 col-lg-4 col-12 d-none">
          <div class="box" style="height:450px;">
            <div class="box-header">
              <h4 class="box-title">Summary</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                View All
              </a>
            </div>
            <div class="box-body">
              <a href="?menu=testimoni" class="box bg-danger bg-hover-danger pull-up">
                <div class="box-body">
                  <div class="d-flex align-items-center">
                    <span class="text-white mdi mdi-credit-card-multiple fs-36"><span class="path1"></span><span class="path2"></span></span>
                    <div class="ms-20">
                      <h4 class="text-white mb-0">0 </h4>
                      <h5 class="text-white-50 mb-0">Total Pengunjung Situs</h5>
                    </div>
                  </div>
                </div>
              </a>


              <a href="?menu=kontak" class="box bg-warning bg-hover-warning pull-up">
                <div class="box-body">
                  <div class="d-flex align-items-center">
                    <span class="text-white mdi mdi-account-multiple-plus fs-36"></span>
                    <div class="ms-20">
                      <h4 class="text-white mb-0">0 </h4>
                      <h5 class="text-white-50 mb-0">Total Kontak</h5>
                    </div>
                  </div>
                </div>
              </a>

              <a href="?menu=testimoni" class="box bg-success bg-hover-success pull-up">
                <div class="box-body">
                  <div class="d-flex align-items-center">
                    <span class="text-white mdi mdi-account-multiple-plus fs-36"></span>
                    <div class="ms-20">
                      <h4 class="text-white mb-0">0 </h4>
                      <h5 class="text-white-50 mb-0">Total Testimoni</h5>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
          <div class="box" style="height:450px;">
            <div class="box-header">
              <h4 class="box-title">Last 10 Testimoni</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                View All
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 25%;">Nama</th>
                      <th style="width: 25%;">Instansi</th>
                      <th style="width: 25%;">Rating</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $filter_status = "Aktif";
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("ORDER BY Id_Testimoni DESC LIMIT 10");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_testimoni", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Testimoni"], "?menu=testimoni"); ?>">
                              <?php echo $data['Nama'] ?>
                            </a>
                          </td>
                          <td><?php echo $data['Instansi'] ?></td>
                          <td><?php echo $data['Rating'] ?></td>

                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
          <div class="box" style="height:450px;">
            <div class="box-header">
              <h4 class="box-title">Last 5 Kontak</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=kontak">
                View All
              </a>
            </div>

            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 25%;">Nama</th>
                      <th style="width: 65%;">Tanggal</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $filter_status = "Aktif";
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("ORDER BY Id_Kontak DESC LIMIT 10");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_kontak", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Kontak"], "?menu=kontak"); ?>">
                              <?php echo $data['Nama'] ?>
                            </a>
                          </td>
                          <td><?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']) ?></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>

        </div>



        <div class="col-xl-4 col-lg-4 col-12">
          <div class="box" style="height:450px;">
            <div class="box-header">
              <h4 class="box-title">Last 10 Newsletter</h4>
              <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=testimoni">
                View All
              </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-borderless table-hover">
                  <thead>
                    <tr>
                      <th style="width: 5%;">No</th>
                      <th style="width: 25%;">Email</th>
                      <th style="width: 25%;">Waktu</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $filter_status = "Aktif";
                    $search_field_where = array("Status");
                    $search_criteria_where = array("=");
                    $search_value_where = array("$filter_status");
                    $search_connector_where = array("ORDER BY Id_Newsletter DESC LIMIT 10");
                    $nomor = 0;

                    $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_newsletter", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                    if ($result['Status'] == "Sukses") {
                      $data_hasil = $result['Hasil'];

                      foreach ($data_hasil as $data) {
                        $nomor++; ?>
                        <tr>
                          <td><?php echo $nomor ?></td>
                          <td>
                            <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Newsletter"], "?menu=newsletter"); ?>">
                              <?php echo $data['Email'] ?>
                            </a>
                          </td>
                          <td><?php echo tanggal_dan_waktu_24_jam_indonesia($data['Waktu_Simpan_Data']) ?></td>
                        </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</div>