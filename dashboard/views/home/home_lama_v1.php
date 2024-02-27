<?php 
$search_field_where = array("Status");
$search_criteria_where = array("=");
$search_value_where = array("Aktif");
$search_connector_where = array("");

$nomor = 0;

$result = $a_hitung_saldo->hitung_saldo("tb_histori_saldo_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

if($result['Status'] == 'Sukses'){
  $Saldo_Saat_Ini = $result['Hasil'];
}else{
  $Saldo_Saat_Ini = 0;
}

//TOTAL SISWA
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");
$count_value_where = array("Aktif");

$Total_Siswa_Saat_Ini = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_siswa",$count_field_where,$count_criteria_where,$count_value_where,$count_connector_where);
$Total_Siswa_Saat_Ini = $Total_Siswa_Saat_Ini['Hasil'];

//TOTAL MARKETING
$count_field_where = array("Status");
$count_criteria_where = array("=");
$count_connector_where = array("");
$count_value_where = array("Aktif");

$Total_Marketing_Saat_Ini = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_data_marketing",$count_field_where,$count_criteria_where,$count_value_where,$count_connector_where);
$Total_Marketing_Saat_Ini = $Total_Marketing_Saat_Ini['Hasil'];


//FUNGSI UNTUK MENGURUTKAN ARRAY OBJECT
function array_orderby()
{
  $args = func_get_args();
  $data = array_shift($args);
  foreach ($args as $n => $field) {
    if (is_string($field)) {
      $tmp = array();
      foreach ($data as $key => $row)
        $tmp[$key] = $row[$field];
      $args[$n] = $tmp;
    }
  }
  $args[] = &$data;
  call_user_func_array('array_multisort', $args);
  return array_pop($args);
}
//FUNGSI UNTUK MENGURUTKAN ARRAY OBJECT

?>
<div class="content-wrapper">
  <div class="container-full">
    <!-- Main content -->
    <section class="content">

      <!-- BARIS KE -1  -->      
      <div class="row align-items-end">
        <div class="col-xl-9 col-12">
          <div class="box bg-primary-light pull-up">
            <div class="box-body p-xl-0">             
              <div class="row align-items-center">
                <div class="col-12 col-lg-3"><img src="../images/svg-icon/color-svg/custom-14.svg" alt=""></div>
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
              <h3 class="px-30 mb-20">Apakah ada <br>Try Out baru?</h3>             
              <a href="?menu=dashboard_admin_try_out_master&tambah" class="waves-effect waves-light w-p100 btn btn-primary"><i class="fa fa-plus me-15"></i> Buat Try Out Baru</a>
            </div>
          </div>
        </div>
      </div>

      <!-- BARIS KE -2  -->
      <div class="row">
        <div class="col-12">                            
          <div class="box no-shadow mb-0 bg-transparent">
            <div class="box-header no-border px-0">
              <h4 class="box-title">Try Out yang Sedang Berjalan (3 Teratas)</h4> 
            </div>
          </div>
        </div>

        <?php

        $search_field_where = array("Status");
        $search_criteria_where = array("=");
        $search_value_where = array("Aktif");
        $search_connector_where = array("ORDER BY Id_Try_Out_Master DESC");

        $hitung = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_try_out_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

        $hitung_tryout = $hitung['Hasil'];

        $search_field_where = array("Status");
        $search_criteria_where = array("=");
        $search_value_where = array("Aktif");
        $search_connector_where = array("ORDER BY Id_Try_Out_Master DESC LIMIT 3");

        $nomor = 0;

        $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_try_out_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

        if($result['Status'] == "Sukses"){
          $data_hasil = $result['Hasil'];

          foreach($data_hasil as $data_list_try_out_master){ $nomor++;

            $Jumlah_Siswa_Mengikuti_Try_Out = 0;
            $array_data_rangking_siswa = null;

            ///DATA ASLI
            $search_field_where = array("Id_Try_Out_Master");
            $search_criteria_where = array("=");
            $search_value_where = array("$data_list_try_out_master[Id_Try_Out_Master]");
            $search_connector_where = array("");

            $nomor_array = 0;

            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_siswa_try_out_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

            if($result['Status'] == "Sukses"){
              $data_hasil = $result['Hasil'];

              foreach($data_hasil as $data){ ?>
                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_siswa_try_out_master_total_nilai","Id_Siswa_Try_Out_Master",$data['Id_Siswa_Try_Out_Master']);

                if($result['Status'] == "Sukses"){
                  $data_total_nilai = $result['Hasil'];
                }
                else{
                  $data_total_nilai = null;
                }
                ?>


                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_siswa_try_out_master","Id_Siswa_Try_Out_Master",$data['Id_Siswa_Try_Out_Master']);

                if($result['Status'] == "Sukses"){
                  $data_try_out_master = $result['Hasil'];
                }
                else{
                  $data_try_out_master = null;
                }
                ?>



                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_siswa","Id_Siswa",$data_try_out_master['Id_Siswa']);

                if($result['Status'] == "Sukses"){
                  $data_siswa = $result['Hasil'];
                }
                else{
                  $data_siswa = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data_try_out_master['Id_Jurusan_1']);

                if($result['Status'] == "Sukses"){
                  $data_jurusan_1 = $result['Hasil'];
                }
                else{
                  $data_jurusan_1 = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data_try_out_master['Id_Jurusan_2']);

                if($result['Status'] == "Sukses"){
                  $data_jurusan_2 = $result['Hasil'];
                }
                else{
                  $data_jurusan_2 = null;
                }
                ?>


                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_try_out_master['Id_Universitas_1']);

                if($result['Status'] == "Sukses"){
                  $data_universitas_1 = $result['Hasil'];
                }
                else{
                  $data_universitas_1 = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_try_out_master['Id_Universitas_2']);

                if($result['Status'] == "Sukses"){
                  $data_universitas_2 = $result['Hasil'];
                }
                else{
                  $data_universitas_2 = null;
                }
                ?>


                <?php 

                $array_data_rangking_siswa['Data'][$nomor_array]['Id_Siswa'] = $data_siswa['Id_Siswa'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Nama_Lengkap'] = $data_siswa['Nama_Lengkap'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Jenis_Kelamin'] = $data_siswa['Jenis_Kelamin'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Universitas_Jurusan_Pilihan_1'] = $data_universitas_1['Nama_Universitas']." - ".$data_jurusan_1['Nama_Jurusan'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Universitas_Jurusan_Pilihan_2'] = $data_universitas_2['Nama_Universitas']." - ".$data_jurusan_2['Nama_Jurusan'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Total_Nilai_Akhir_Siswa'] = $data_total_nilai['Total_Nilai_Akhir_Siswa'];


                $nomor_array++;
                ?>
              <?php } ?>
            <?php } //DATA ASLI ?>


            <?php
            //DATA BAYANGAN
            $search_field_where = array("Id_Try_Out_Master");
            $search_criteria_where = array("=");
            $search_value_where = array("$data_list_try_out_master[Id_Try_Out_Master]");
            $search_connector_where = array("");

            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_siswa_bayangan_try_out_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

            if($result['Status'] == "Sukses"){
              $data_hasil = $result['Hasil'];

              foreach($data_hasil as $data){ ?>
                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_siswa_bayangan_try_out_master_total_nilai","Id_Siswa_Bayangan_Try_Out_Master",$data['Id_Siswa_Bayangan_Try_Out_Master']);

                if($result['Status'] == "Sukses"){
                  $data_total_nilai = $result['Hasil'];
                }
                else{
                  $data_total_nilai = null;
                }
                ?>


                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_siswa_bayangan_try_out_master","Id_Siswa_Bayangan_Try_Out_Master",$data['Id_Siswa_Bayangan_Try_Out_Master']);

                if($result['Status'] == "Sukses"){
                  $data_try_out_master = $result['Hasil'];
                }
                else{
                  $data_try_out_master = null;
                }
                ?>



                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_data_siswa_bayangan","Id_Siswa_Bayangan",$data_try_out_master['Id_Siswa_Bayangan']);

                if($result['Status'] == "Sukses"){
                  $data_siswa = $result['Hasil'];
                }
                else{
                  $data_siswa = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data_try_out_master['Id_Jurusan_1']);

                if($result['Status'] == "Sukses"){
                  $data_jurusan_1 = $result['Hasil'];
                }
                else{
                  $data_jurusan_1 = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data_try_out_master['Id_Jurusan_2']);

                if($result['Status'] == "Sukses"){
                  $data_jurusan_2 = $result['Hasil'];
                }
                else{
                  $data_jurusan_2 = null;
                }
                ?>


                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_try_out_master['Id_Universitas_1']);

                if($result['Status'] == "Sukses"){
                  $data_universitas_1 = $result['Hasil'];
                }
                else{
                  $data_universitas_1 = null;
                }
                ?>

                <?php 
                $result = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_try_out_master['Id_Universitas_2']);

                if($result['Status'] == "Sukses"){
                  $data_universitas_2 = $result['Hasil'];
                }
                else{
                  $data_universitas_2 = null;
                }
                ?>

                <?php 

                $array_data_rangking_siswa['Data'][$nomor_array]['Total_Nilai_Akhir_Siswa'] = $data_total_nilai['Total_Nilai_Akhir_Siswa_Bayangan'];

                $array_data_rangking_siswa['Data'][$nomor_array]['Id_Siswa'] = "-";
                $array_data_rangking_siswa['Data'][$nomor_array]['Nama_Lengkap'] = $data_siswa['Nama_Lengkap'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Jenis_Kelamin'] = $data_siswa['Jenis_Kelamin'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Universitas_Jurusan_Pilihan_1'] = $data_universitas_1['Nama_Universitas']." - ".$data_jurusan_1['Nama_Jurusan'];
                $array_data_rangking_siswa['Data'][$nomor_array]['Universitas_Jurusan_Pilihan_2'] = $data_universitas_2['Nama_Universitas']." - ".$data_jurusan_2['Nama_Jurusan'];



                $nomor_array++;
                ?>
              <?php } ?>
            <?php } //DATA BAYANGAN ?>

            <?php $nomor = 0; ?>
            <?php 
            if(isset($array_data_rangking_siswa)){
              $data_hasil_rangking_siswa_dari_nilai_tertinggi = array_orderby($array_data_rangking_siswa['Data'], 'Total_Nilai_Akhir_Siswa', SORT_DESC); 
              foreach ($data_hasil_rangking_siswa_dari_nilai_tertinggi as $data_rangking_siswa) { $nomor++; 
                $Jumlah_Siswa_Mengikuti_Try_Out++; 
                ?>
                <?php 
              }
            }
            ?>

            <?php if ($hitung_tryout=="1") {
              $col = "col-xl-12";
            } else if ($hitung_tryout=="2") {
              $col = "col-xl-6";
            }else{
              $col = "col-xl-4";
            } ?>

            <div class="<?php echo $col; ?>">
              <div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
                <div class="box-body">  
                  <div class="flex-grow-1"> 
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                      <div class="d-flex">                  
                        <span class="badge badge-success me-15">Sedang Berlangsung</span>
                      </div>
                    </div>
                    <a href="?menu=dashboard_admin_try_out_master&edit&id=<?php echo $a_hash->encode($data_list_try_out_master["Id_Try_Out_Master"],"dashboard_admin_try_out_master"); ?>" style="cursor:pointer;">
                      <h4 class="mt-25 mb-5"><?php echo $data_list_try_out_master['Judul_Try_Out'] ?></h4>
                    </a>
                    <p class="text-fade mb-0 fs-12">
                      Pendaftaran : <?php echo tanggal_dan_waktu_24_jam_indonesia($data_list_try_out_master['Waktu_Mulai_Pendaftaran']);?>  WIB
                      <br>
                      Try Out : <?php echo tanggal_dan_waktu_24_jam_indonesia($data_list_try_out_master['Waktu_Mulai_Try_Out']);?> WIB
                    </p>
                    <p class="text-fade mb-0 fs-12">Jumlah peserta : <span class="badge badge-success-light"> <?php echo $Jumlah_Siswa_Mengikuti_Try_Out ?></span> </p>
                  </div>  
                </div>          
              </div>
            </div>
          <?php } ?>
        <?php } ?>


      </div>

      <!-- BARIS KE -3 -->
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
                              <h4 class="text-white mb-0"><?php echo $a_format_angka->rupiah($Saldo_Saat_Ini) ?>,-</h4>
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
                              <h4 class="text-white mb-0"><?php echo $Total_Siswa_Saat_Ini ?> Orang</h4>
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
                              <h4 class="text-white mb-0"><?php echo $Total_Marketing_Saat_Ini ?> Orang</h4>
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
                            <?php

                            $search_field_where = array("Status_Pembayaran");
                            $search_criteria_where = array("=");
                            $search_value_where = array("Berhasil");
                            $search_connector_where = array("");
                            $result = $a_hitung_data->lihat_data_terbanyak_dengan_filter("tb_siswa_try_out_master","Id_Siswa","Jumlah_Try_Out",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where,"5");

                            if($result['Status'] == "Sukses"){
                              $nomor = 0;
                              $data_hasil = $result['Hasil'];
                              foreach($data_hasil as $data){
                                $nomor++;
                                ?>
                                <tr>
                                  <td>
                                    <div class="bg-success h-30 w-30 l-h-30 rounded text-center">
                                      <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                                    </div>
                                  </td>
                                  <td class="fw-600">
                                    <?php
                                    $read_siswa = $a_tambah_baca_update_hapus->baca_data_id("tb_data_siswa","Id_Siswa",$data['Id_Siswa']);
                                    $data_siswa = $read_siswa['Hasil']; 
                                    ?>

                                    <a href="?menu=dashboard_admin_data_siswa&edit&id=<?php echo $a_hash->encode($data_siswa["Id_Siswa"],"?menu=dashboard_admin_data_siswa"); ?>">
                                      <?php echo $data_siswa['Nama_Lengkap']; ?>
                                    </a>

                                    <br>
                                  </td>
                                  <td class="fw-600 text-center"><?php echo $data['Jumlah_Try_Out'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                                </tr>
                                <?php
                              }
                            }
                            ?>
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
                            <?php

                            $search_field_where = array("Register_Melalui_Kode_Referral");
                            $search_criteria_where = array("<>");
                            $search_value_where = array("");
                            $search_connector_where = array("");
                            $result = $a_hitung_data->lihat_data_terbanyak_dengan_filter("tb_data_siswa","Register_Melalui_Kode_Referral","Jumlah_Referral",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where,"5");

                            if($result['Status'] == "Sukses"){
                              $nomor = 0;
                              $data_hasil = $result['Hasil'];
                              foreach($data_hasil as $data){
                                $nomor++;
                                ?>
                                <tr>
                                  <td>
                                    <div class="bg-warning h-30 w-30 l-h-30 rounded text-center">
                                      <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                                    </div>
                                  </td>
                                  <td class="fw-600">
                                    <?php
                                    
                                    $read_marketing = $a_tambah_baca_update_hapus->baca_data_id("tb_data_marketing","Kode_Referral",$data['Register_Melalui_Kode_Referral']);

                                    if ($read_marketing['Status']=="Sukses") {
                                      $data_marketing = $read_marketing['Hasil']; ?>

                                      <a href="?menu=dashboard_admin_data_marketing&edit&id=<?php echo $a_hash->encode($data_marketing["Id_Marketing"],"?menu=dashboard_admin_data_marketing"); ?>">
                                        <?php 
                                        if ($data_marketing['Nama_Lengkap']<>"") {
                                          echo $data_marketing['Nama_Lengkap'];
                                        }else{
                                          echo $data_marketing['Username'];
                                        }
                                        ?>
                                      </a>

                                      <br> <font class="text-muted" style="font-size: 12px;"><?php echo $data['Register_Melalui_Kode_Referral']." - ".$data_marketing['Sebagai_Marketing']; ?></font>
                                      <?php
                                    }else{

                                      $read_siswa = $a_tambah_baca_update_hapus->baca_data_id("tb_data_siswa","Kode_Referral",$data['Register_Melalui_Kode_Referral']);
                                      $data_siswa = $read_siswa['Hasil']; ?>
                                      <a href="?menu=dashboard_admin_data_siswa&edit&id=<?php echo $a_hash->encode($data_siswa["Id_Siswa"],"?menu=dashboard_admin_data_siswa"); ?>">
                                        <?php echo $data_siswa['Nama_Lengkap']; ?>
                                      </a>
                                    ?><br> <font class="text-muted" style="font-size: 12px;"><?php echo $data['Register_Melalui_Kode_Referral']." - Siswa "; ?></font>
                                    <?php
                                  }
                                  ?>
                                </td>
                                <td class="fw-600 text-center"><?php echo $data['Jumlah_Referral'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                              </tr>
                              <?php
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-12">
                <div class="box" style="height:auto;">
                  <div class="box-header">
                    <h4 class="box-title">Top 5 Universitas (Pilihan 1)</h4>
                    <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=dashboard_admin_universitas">
                      View All
                    </a>
                  </div>

                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Universitas</th>
                            <th class="text-center">Peminat</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = $a_hitung_data->lihat_data_terbanyak("tb_siswa_try_out_master","Id_Universitas_1","Jumlah_Peminat","5");

                          if($result['Status'] == "Sukses"){
                            $nomor = 0;
                            $data_hasil = $result['Hasil'];
                            foreach($data_hasil as $data){
                              $nomor++;
                              ?>
                              <tr>
                                <td>
                                  <div class="bg-info h-30 w-30 l-h-30 rounded text-center">
                                    <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                                  </div>
                                </td>
                                <td class="fw-600">
                                  <?php
                                  $read_univ = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data['Id_Universitas_1']);
                                  $data_univ = $read_univ['Hasil']; ?>

                                  <a href="?menu=dashboard_admin_universitas&edit&id=<?php echo $a_hash->encode($data_univ["Id_Universitas"],"?menu=dashboard_admin_data_universitas"); ?>">
                                    <?php echo $data_univ['Nama_Universitas']; ?>
                                  </a>
                                  <br>
                                </td>
                                <td class="fw-600 text-center"><?php echo $data['Jumlah_Peminat'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                              </tr>
                              <?php
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-12">
                <div class="box" style="height:auto;">
                  <div class="box-header">
                    <h4 class="box-title">Top 5 Universitas (Pilihan 2)</h4>
                    <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=dashboard_admin_universitas">
                      View All
                    </a>
                  </div>

                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Universitas</th>
                            <th class="text-center">Peminat</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = $a_hitung_data->lihat_data_terbanyak("tb_siswa_try_out_master","Id_Universitas_2","Jumlah_Peminat","5");

                          if($result['Status'] == "Sukses"){
                            $nomor = 0;
                            $data_hasil = $result['Hasil'];
                            foreach($data_hasil as $data){
                              $nomor++;
                              ?>
                              <tr>
                                <td>
                                  <div class="bg-danger h-30 w-30 l-h-30 rounded text-center">
                                    <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                                  </div>
                                </td>
                                <td class="fw-600">
                                  <?php
                                  $read_univ = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data['Id_Universitas_2']);
                                  $data_univ = $read_univ['Hasil']; ?>
                                  <a href="?menu=dashboard_admin_universitas&edit&id=<?php echo $a_hash->encode($data_univ["Id_Universitas"],"?menu=dashboard_admin_data_universitas"); ?>">
                                    <?php echo $data_univ['Nama_Universitas']; ?>
                                  </a>
                                  <br>
                                </td>
                                <td class="fw-600 text-center"><?php echo $data['Jumlah_Peminat'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                              </tr>
                              <?php
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> 

              <div class="col-xl-6 col-lg-6 col-12">
                <div class="box" style="height:auto;">
                  <div class="box-header">
                    <h4 class="box-title">Top 5 Jurusan (Pilihan 1)</h4>
                    <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="#">
                      View All
                    </a>
                  </div>
                  <div class="box-body">
                    <div class="table-responsive">
                      <table class="table table-borderless table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Jurusan</th>
                            <th class="text-center">Peminat</th>
                          </tr>
                        </thead>
                        <tbody>

                         <?php
                         $result = $a_hitung_data->lihat_data_terbanyak("tb_siswa_try_out_master","Id_Jurusan_1","Jumlah_Peminat","5");

                         if($result['Status'] == "Sukses"){
                          $nomor = 0;
                          $data_hasil = $result['Hasil'];
                          foreach($data_hasil as $data){
                            $nomor++;
                            ?>


                            <tr>
                              <td>
                                <div class="bg-success h-30 w-30 l-h-30 rounded text-center">
                                  <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                                </div>
                              </td>
                              <td class="fw-600">
                               <?php
                               $read_jurusan = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data['Id_Jurusan_1']);
                               $data_jurusan = $read_jurusan['Hasil']; 
                               ?>

                               <a href="?menu=dashboard_admin_jurusan&edit&id=<?php echo $a_hash->encode($data_jurusan["Id_Jurusan"],"?menu=dashboard_admin_data_jurusan"); ?>">
                                 <?php echo $data_jurusan['Nama_Jurusan'];  ?>
                               </a>

                               <br>
                               <?php
                               $read_univ = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_jurusan['Id_Universitas']);
                               $data_univ = $read_univ['Hasil'];
                               ?>
                               <span class="text-muted" style="font-size: 12px;"><?php echo $data_univ['Nama_Universitas']; ?></span>
                             </td>
                             <td class="fw-600 text-center"><?php echo $data['Jumlah_Peminat'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                           </tr>
                           <?php
                         }
                       }
                       ?>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
           </div>

           <div class="col-xl-6 col-lg-6 col-12">
            <div class="box" style="height:auto;">
              <div class="box-header">
                <h4 class="box-title">Top 5 Jurusan (Pilihan 2)</h4>
                <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="#">
                  View All
                </a>
              </div>
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-borderless table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Jurusan</th>
                        <th class="text-center">Peminat</th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php
                     $result = $a_hitung_data->lihat_data_terbanyak("tb_siswa_try_out_master","Id_Jurusan_2","Jumlah_Peminat","5");

                     if($result['Status'] == "Sukses"){
                      $nomor = 0;
                      $data_hasil = $result['Hasil'];
                      foreach($data_hasil as $data){
                        $nomor++;
                        ?>

                        <tr>
                          <td>
                            <div class="bg-danger h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600"><?php echo $nomor; ?></p>
                            </div>
                          </td>
                          <td class="fw-600">
                           <?php
                           $read_jurusan = $a_tambah_baca_update_hapus->baca_data_id("tb_jurusan","Id_Jurusan",$data['Id_Jurusan_2']);
                           $data_jurusan = $read_jurusan['Hasil']; ?>


                           <a href="?menu=dashboard_admin_jurusan&edit&id=<?php echo $a_hash->encode($data_jurusan["Id_Jurusan"],"?menu=dashboard_admin_data_jurusan"); ?>">
                             <?php echo $data_jurusan['Nama_Jurusan'];  ?>
                           </a>

                           <br>
                           <?php
                           $read_univ = $a_tambah_baca_update_hapus->baca_data_id("tb_universitas","Id_Universitas",$data_jurusan['Id_Universitas']);
                           $data_univ = $read_univ['Hasil'];
                           ?>
                           <span class="text-muted" style="font-size: 12px;"><?php echo $data_univ['Nama_Universitas']; ?></span>
                         </td>
                         <td class="fw-600 text-center"><?php echo $data['Jumlah_Peminat'] ?> &nbsp; <i class="icon-User"><span class="path1"></span><span class="path2"></span></i></td>
                       </tr>
                       <?php
                     }
                   }
                   ?>





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

</div>
</section>
</div>

<script>
  var options = {
    series: [{
      name: 'Website Blog',
      type: 'column',
      data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
    }, {
      name: 'Social Media',
      type: 'line',
      data: [23, 42, 35, 27, 43, 22, 17, 31, 22, 22, 12, 16]
    }],
    chart: {
      height: 350,
      type: 'line',
    },
    stroke: {
      width: [0, 4]
    },
    title: {
      text: 'Traffic Sources'
    },
    dataLabels: {
      enabled: true,
      enabledOnSeries: [1]
    },
    labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001', '06 Jan 2001', '07 Jan 2001', '08 Jan 2001', '09 Jan 2001', '10 Jan 2001', '11 Jan 2001', '12 Jan 2001'],
    xaxis: {
      type: 'datetime'
    },
    yaxis: [{
      title: {
        text: 'Website Blog',
      },

    }, {
      opposite: true,
      title: {
        text: 'Social Media'
      }
    }]
  };
  var chart = new ApexCharts(document.querySelector("#advance_column_chart"), options);
  chart.render();
</script>

<script>
  var options = {
    series: [
    {
      name: "Pilihan Jurusan ke-1",
      data: [180, 290, 1023, 819, 2940]
    }
    ],
    chart: {
      height: 350,
      type: 'line',
      dropShadow: {
        enabled: true,
        color: '#000',
        // top: 18,
        // left: 7,
        // blur: 10,
        opacity: 0.2
      },
      toolbar: {
        show: true
      }
    },
    colors: ['#ff8f00'],
    dataLabels: {
      enabled: true,
    },
    stroke: {
      curve: 'straight'
    },
    title: {
      text: 'Riwayat Peringkat',
      align: 'left'
    },
    grid: {
      borderColor: '#e7e7e7',
      row: {
        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
      },
    },
    markers: {
      size: 1
    },
    xaxis: {
      categories: ['TO 1', 'TO 2', 'TO 3', 'TO 4', 'TO 5', 'TO 6'],
      title: {
        text: 'Nama Try Out'
      },
    },
    yaxis: {
      title: {
        text: 'Peringkat'
      },
    },
  };
  var chart = new ApexCharts(document.querySelector("#grafik_peserta_tryout"), options);
  chart.render();
</script>

<script>
  var options = {
    series: [{
      data: [400, 430, 690, 590, 1090, 1000, 1380]
    }],
    chart: {
      type: 'bar',
      height: 350
    },
    toolbar :{
      show : true,
    },
    /*plotOptions: {
    column: {
    borderRadius: 4,
    horizontal: true,
    }
  },*/
  title: {
    text: 'Saldo Tryout Mandiri',
    align: 'left'
  },
  dataLabels: {
    enabled: true
  },
  xaxis: {
    categories: ['TO X', 'TO X', 'TO X', 'TO X', 'TO X', 'TO X', 'TO X'],
    title: {
      text: 'Nama Try Out'
    },
  },
  yaxis: {
    title: {
      text: 'Jumlah dalam Rupiah (Rp)'
    },
  },
};
var chart = new ApexCharts(document.querySelector("#chart_saldo_tryout_mandiri"), options);
chart.render();
</script>