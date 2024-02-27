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
              <h4 class="box-title">Try Out yang Sedang Berjalan</h4> 
            </div>
          </div>
        </div>

        <?php

          $search_field_where = array("Status");

          $search_criteria_where = array("=");

          $search_value_where = array("Aktif");

          $search_connector_where = array("");


          $nomor = 0;


          $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_try_out_master",$search_field_where,$search_criteria_where,$search_value_where,$search_connector_where);

          if($result['Status'] == "Sukses"){
            $data_hasil = $result['Hasil'];

            foreach($data_hasil as $data_list_try_out_master){ $nomor++; ?>
              <?php $Jumlah_Siswa_Mengikuti_Try_Out = 0; ?>

              <?php 
            $array_data_rangking_siswa = null;
            ?>
            <?php
            //DATA ASLI
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
                $array_data_rangking_siswa['Data'][$nomor_array]['Total_Bobot_Nilai_Try_Out'] = $data_total_nilai['Total_Bobot_Nilai_Try_Out'];
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
                $array_data_rangking_siswa['Data'][$nomor_array]['Total_Bobot_Nilai_Try_Out'] = $data_total_nilai['Total_Bobot_Nilai_Try_Out'];


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

            <div class="col-xl-4 col-md-6 col-12">
              <div class="box bg-secondary-light pull-up" style="background-image: url(../images/svg-icon/color-svg/st-1.svg); background-position: right bottom; background-repeat: no-repeat;">
                <div class="box-body">  
                  <div class="flex-grow-1"> 
                    <div class="d-flex align-items-center pe-2 justify-content-between">
                      <div class="d-flex">                  
                        <span class="badge badge-success me-15">Sedang Berlangsung</span>
                      </div>
                      <div class="dropdown" style="display: none">
                        <a data-bs-toggle="dropdown" href="#" class="px-10 pt-5"><i class="ti-more-alt"></i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                          <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                          <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                        </div>
                      </div>            
                    </div>
                    <h4 class="mt-25 mb-5"><?php echo $data_list_try_out_master['Judul_Try_Out'] ?></h4>
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
          <div class="box no-shadow mb-0 bg-transparent">
            <div class="box-header no-border px-0">
              <h4 class="box-title">Performance & Statistics</h4> 
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="row">
            <div class="col-xl-12 col-12">
              <div class="row">

                <div class="col-xl-4 col-lg-4 col-12">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Top 5 Universitas</h4>
                      <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;" href="?menu=dashboard_admin_universitas">
                        View All
                      </a>
                    </div>
                    <div class="box-body">
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>40%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Indonesia</p>
                          <p class="text-fade mb-0">117 User</p>
                        </div>
                      </div>
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>20%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Gajah Mada</p>
                          <p class="text-fade mb-0">74 User</p>
                        </div>
                      </div>
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width: 18%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>18%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Institut Pertanian Bogor</p>
                          <p class="text-fade mb-0">58 User</p>
                        </div>
                      </div>

                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100" style="width: 17%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>07%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Institut Teknologi Bandung</p>
                          <p class="text-fade mb-0">11 User</p>
                        </div>
                      </div>

                      <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>07%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Negeri Jakarta</p>
                          <p class="text-fade mb-0">11 User</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-12">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Top 5 Jurusan</h4>
                      <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                        View All
                      </a>
                    </div>
                    <div class="box-body">
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>40%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Indonesia</p>
                          <p class="text-fade mb-0">117 User</p>
                        </div>
                      </div>
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>20%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Gajah Mada</p>
                          <p class="text-fade mb-0">74 User</p>
                        </div>
                      </div>
                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100" style="width: 18%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>18%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Institut Pertanian Bogor</p>
                          <p class="text-fade mb-0">58 User</p>
                        </div>
                      </div>

                      <div class="mb-30">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100" style="width: 17%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>07%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Institut Teknologi Bandung</p>
                          <p class="text-fade mb-0">11 User</p>
                        </div>
                      </div>

                      <div class="mb-5">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="w-p85">
                            <div class="progress progress-sm mb-0">
                              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
                              </div>
                            </div>
                          </div>
                          <div>
                            <div>07%</div>
                          </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                          <p class="mb-0 text-primary">Universitas Negeri Jakarta</p>
                          <p class="text-fade mb-0">11 User</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4">
                  <div class="box">
                    <div class="box-header">
                     <h4 class="box-title">Summary</h4>
                     <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                      View All
                    </a>
                  </div>
                  <div class="box-body">
                    <a href="#" class="box bg-danger bg-hover-danger pull-up">
                      <div class="box-body">
                        <div class="d-flex align-items-center">
                          <span class="text-white mdi mdi-credit-card-multiple fs-36"><span class="path1"></span><span class="path2"></span></span>
                          <div class="ms-20">
                            <h4 class="text-white mb-0">Rp <?php echo $Saldo_Saat_Ini ?>,-</h4>
                            <h5 class="text-white-50 mb-0">Total Uang yang Masuk</h5>
                          </div>
                        </div>              
                      </div>
                    </a>

                    <a href="#" class="box bg-primary bg-hover-primary pull-up">
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

                    <a href="#" class="box bg-success bg-hover-success pull-up">
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
            </div>
          </div>
        </div>

        <div class="col-xl-12 col-12">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-12" style="display: none">
              <div class="box">
                <div class="box-header">
                  <h4 class="box-title">Top 5 Siswa</h4>
                  <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                    View All
                  </a>
                </div>
                <div class="box-body py-10">
                  <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <tbody>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Skor</th>
                          </tr>
                        </thead>
                        <tr>
                          <td>
                            <div class="bg-danger h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">1</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Skor</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-warning h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">2</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Skor</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-success h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">3</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Skor</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-info h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">4</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Skor</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-primary h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">5</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-success me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Skor</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-12" style="display: none">
              <div class="box">
                <div class="box-header">
                  <h4 class="box-title">Top 5 Marketing</h4>
                  <a class="box-controls pull-right d-md-flex d-none" style="cursor: pointer;">
                    View All
                  </a>
                </div>
                <div class="box-body py-10">
                  <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                      <tbody>
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jumlah Referal</th>
                          </tr>
                        </thead>
                        <tr>
                          <td>
                            <div class="bg-danger h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">1</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Jumlah Referal</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-warning h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">2</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-warning me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Jumlah Referal</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-success h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">3</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Jumlah Referal</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-info h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">4</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-primary me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Jumlah Referal</td>
                        </tr>
                        <tr>
                          <td>
                            <div class="bg-primary h-30 w-30 l-h-30 rounded text-center">
                              <p class="mb-0 fs-15 fw-600">5</p>
                            </div>
                          </td>
                          <td class="fw-600">Nama Siswa</td>
                          <td class="fw-500"><span class="badge badge-sm badge-dot badge-success me-10"></span>Asal Sekolah</td>
                          <td class="fw-600">Jumlah Referal</td>
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

    <!-- BARUS KE 4 -->
    <div class="row" style="display: none">
      <div class="col-12">
        <div class="box no-shadow mb-0 bg-transparent">
          <div class="box-header no-border px-0">
            <h4 class="box-title">Riwayat Transaksi</h4> 
          </div>
        </div>
      </div>


      <div class="col-xl-6 col-lg-6 col-6">
        <div class="box">
          <div class="box-body">
            <div id="basic-line" style="height:350px;"></div>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-6">
        <div class="box">
          <div class="box-body">
            <div id="chart_riwayat_try_out_2"></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
</div>


<!-- CHAT -->
<div id="chat-box-body">
  <div id="chat-circle" class="waves-effect waves-circle btn btn-circle btn-lg btn-warning l-h-70">
    <div id="chat-overlay"></div>
    <span class="icon-Group-chat fs-30"><span class="path1"></span><span class="path2"></span></span>
  </div>

  <div class="chat-box">
    <div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
      <div class="btn-group">
        <button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-45" type="button" data-bs-toggle="dropdown">
          <span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
        </button>
        <div class="dropdown-menu min-w-200">
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Color me-15"></span>
          New Group</a>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
          Contacts</a>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
          Groups</a>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
          Calls</a>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
          Settings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
          Help</a>
          <a class="dropdown-item fs-16" href="#">
            <span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span> 
          Privacy</a>
        </div>
      </div>
      <div class="text-center flex-grow-1">
        <div class="text-dark fs-18">Mayra Sibley</div>
        <div>
          <span class="badge badge-sm badge-dot badge-primary"></span>
          <span class="text-muted fs-12">Active</span>
        </div>
      </div>
      <div class="chat-box-toggle">
        <button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-45" type="button">
          <span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
        </button>                    
      </div>
    </div>
    <div class="chat-box-body">
      <div class="chat-box-overlay">   
      </div>
      <div class="chat-logs">
        <div class="chat-msg user">
          <div class="d-flex align-items-center">
            <span class="msg-avatar">
              <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
            </span>
            <div class="mx-10">
              <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
              <p class="text-muted fs-12 mb-0">2 Hours</p>
            </div>
          </div>
          <div class="cm-msg-text">
            Hi there, I'm Jesse and you?
          </div>
        </div>
        <div class="chat-msg self">
          <div class="d-flex align-items-center justify-content-end">
            <div class="mx-10">
              <a href="#" class="text-dark hover-primary fw-bold">You</a>
              <p class="text-muted fs-12 mb-0">3 minutes</p>
            </div>
            <span class="msg-avatar">
              <img src="../images/avatar/3.jpg" class="avatar avatar-lg">
            </span>
          </div>
          <div class="cm-msg-text">
            My name is Anne Clarc.         
          </div>        
        </div>
        <div class="chat-msg user">
          <div class="d-flex align-items-center">
            <span class="msg-avatar">
              <img src="../images/avatar/2.jpg" class="avatar avatar-lg">
            </span>
            <div class="mx-10">
              <a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
              <p class="text-muted fs-12 mb-0">40 seconds</p>
            </div>
          </div>
          <div class="cm-msg-text">
            Nice to meet you Anne.<br>How can i help you?
          </div>
        </div>
      </div><!--chat-log -->
    </div>
    <div class="chat-input">      
      <form>
        <input type="text" id="chat-input" placeholder="Send a message..."/>
        <button type="submit" class="chat-submit" id="chat-submit">
          <span class="icon-Send fs-22"></span>
        </button>
      </form>      
    </div>
  </div>
</div>
<!-- Page Content overlay -->

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

  var chart = new ApexCharts(document.querySelector("#chart_riwayat_try_out_2"), options);
  chart.render();
</script>