<?php
//UNTUK REDIRECT
if (isset($_GET['url_kembali'])) {
    $url_kembali = $a_hash->decode_link_kembali($_GET['url_kembali']);
    $kehalaman = "$url_kembali";
} else {
    $kehalaman = "?menu=" . $_GET['menu'];
}

//UNTUK MENGAMBIL GET ID SEBAGAI VARIABLE ID PRIMARY
if (isset($_GET['id'])) {
    $Get_Id_Primary = $a_hash->decode($_GET['id'], $_GET['menu']);
}

#-----------------------------------------------------------------------------------
#FUNGSI TAMBAHAN
//CEK INPUTAN REQUIRED
if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
    $_POST['Nama'] = trim($_POST['Nama']);

    if (
        ($_POST['Nama'] == "")
    ) {


        echo "<script>alert('Harap Isi Field Yang Di Butuhkan Dengan Benar')</script>";

        $cek_required = "Gagal";
    } else {
        $cek_required = "Sukses";
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI SIMPAN DATA (CREATE)
if (isset($_POST['submit_simpan'])) {
    if ($cek_required == "Sukses") {

        $form_field = array("Nama", "Instansi", "Pesan", "Nomor_Handphone", "Email", "Waktu_Simpan_Data", "Status");
        $form_value = array("$_POST[Nama]", "$_POST[Instansi]", "$_POST[Pesan]", "$_POST[Nomor_Handphone]", "$_POST[Email]", "$Waktu_Sekarang", "Aktif");

        $result = $a_tambah_baca_update_hapus->tambah_data("tb_kontak", $form_field, $form_value);

        if ($result['Status'] == "Sukses") {

            $a_result_terbaru = $a_tambah_baca_update_hapus->baca_data_terbaru("tb_kontak", "Id_Kontak");
            echo "<script>alert('Data Tersimpan');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Terjadi Kesalahan Saat Menyimpan Data');document.location.href='$kehalaman'</script>";
        }
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI EDIT DATA (READ)
if (isset($_GET['edit'])) {

    $result = $a_tambah_baca_update_hapus->baca_data_id("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        $edit = $result['Hasil'];
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Membaca Data');document.location.href='$kehalaman'</script>";
    }
}
#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI UPDATE DATA (UPDATE)
if (isset($_POST['submit_update'])) {
    if ($cek_required == "Sukses") {
        $form_field = array("Nama", "Instansi", "Pesan", "Nomor_Handphone", "Email");
        $form_value = array("$_POST[Nama]", "$_POST[Instansi]", "$_POST[Pesan]", "$_POST[Nomor_Handphone]", "$_POST[Email]");

        $form_field_where = array("Id_Kontak");
        $form_criteria_where = array("=");
        $form_value_where = array("$Get_Id_Primary");
        $form_connector_where = array("");

        $result = $a_tambah_baca_update_hapus->update_data("tb_kontak", $form_field, $form_value, $form_field_where, $form_criteria_where, $form_value_where, $form_connector_where);

        if ($result['Status'] == "Sukses") {
            echo "<script>alert('Data Terupdate');document.location.href='$kehalaman'</script>";
        } else {
            echo "<script>alert('Terjadi Kesalahan Saat Mengupdate Data');document.location.href='$kehalaman'</script>";
        }
    }
}
#-----------------------------------------------------------------------------------

#-----------------------------------------------------------------------------------
#FUNGSI DELETE DATA (DELETE)
if (isset($_GET['hapus_data_ke_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->hapus_data_ke_tong_sampah("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Terhapus');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['arsip_data'])) {

    $result = $a_tambah_baca_update_hapus->arsip_data("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Dipindahkan Ke Arsip');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Memindahkan Data Ke Arsip');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['restore_data_dari_arsip'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_arsip("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Berhasil Di Keluarkan Dari Arsip');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Mengeluarkan Data Dari Arsip');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['restore_data_dari_tong_sampah'])) {

    $result = $a_tambah_baca_update_hapus->restore_data_dari_tong_sampah("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Di Restore Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Restore Data Dari Tong Sampah');document.location.href='$kehalaman'</script>";
    }
}

if (isset($_GET['hapus_data_permanen'])) {

    // READ DATA
    $result_data = $a_tambah_baca_update_hapus->baca_data_id("tb_kontak", "Id_Kontak", $Get_Id_Primary);

    if ($result_data['Status'] == "Sukses") {
        echo "<script>alert('Data Berhasil Terhapus Permanen');document.location.href='$kehalaman'</script>";
    } else {
        echo "<script>alert('Terjadi Kesalahan Saat Menghapus Data');document.location.href='$kehalaman'</script>";
    }
}

#-----------------------------------------------------------------------------------


#-----------------------------------------------------------------------------------
#FUNGSI HITUNG DATA (COUNT)

$count_field_where = array("Status");

$count_criteria_where = array("=");

$count_connector_where = array("");

//DATA AKTIF
$count_value_where = array("Aktif");
$hitung_Aktif = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_kontak", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Aktif = $hitung_Aktif['Hasil'];
//DATA TERARSIP
$count_value_where = array("Terarsip");
$hitung_Terarsip = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_kontak", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terarsip = $hitung_Terarsip['Hasil'];
//DATA TERHAPUS (SAMPAH)
$count_value_where = array("Terhapus");
$hitung_Terhapus = $a_tambah_baca_update_hapus->hitung_data_dengan_filter("tb_kontak", $count_field_where, $count_criteria_where, $count_value_where, $count_connector_where);
$hitung_Terhapus = $hitung_Terhapus['Hasil'];
#-----------------------------------------------------------------------------------

?>
<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Data Pesan</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="mdi mdi-home-outline"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Pesan</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-12">
                    <?php if ((isset($_GET["tambah"])) or (isset($_GET["edit"]))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <?php if (isset($_GET["tambah"])) { ?>
                                            <h4>Tambah Pesan</h4>
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <h4>Edit Pesan</h4>
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <?php if (isset($_GET["edit"])) { ?>
                                            <script type="text/javascript">
                                                function konfirmasi_hapus_data_permanen() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Permanen Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_permanen&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_hapus_data_ke_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&hapus_data_ke_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_arsip_data() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengarsip Data Ini ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&arsip_data&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_arsip() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Mengeluarkan Data Ini Dari Arsip ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_arsip&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }

                                                function konfirmasi_restore_data_dari_tong_sampah() {
                                                    var txt;
                                                    var r = confirm("Apakah Anda Yakin Ingin Merestore Data Ini Dari Tong Sampah ?");
                                                    if (r == true) {
                                                        document.location.href = '<?php echo $kehalaman ?>&restore_data_dari_tong_sampah&id=<?php echo $_GET['id'] ?>'
                                                    } else {

                                                    }
                                                }
                                            </script>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Aktif") { ?>
                                                        <a href="#" onclick="konfirmasi_arsip_data()"><i class="fa fa-archive fa-md"> ARSIPKAN</i></a>
                                                    <?php } elseif ($edit['Status'] == "Terarsip") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_arsip()"><i class="fa fa-archive fa-md"> AKTIFKAN</i></a>
                                                    <?php } elseif ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_restore_data_dari_tong_sampah()"><i class="fa fa-archive fa-md"> RESTORE</i></a>
                                                    <?php } ?>

                                                </li>
                                                <li class="list-inline-item"> | </li>
                                                <li class="list-inline-item">
                                                    <?php if ($edit['Status'] == "Terhapus") { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_permanen()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
                                                    <?php } elseif (($edit['Status'] == "Aktif") or ($edit['Status'] == "Terarsip")) { ?>
                                                        <a href="#" onclick="konfirmasi_hapus_data_ke_tong_sampah()"><i class="fa fa-trash fa-md"> HAPUS </i></a>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>


                                <form method="POST" enctype="multipart/form-data">
                                    <fieldset class="content-group">
                                        <div class="row">
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 control-label">Nama</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="Nama" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
                                                                                                                        echo $_POST['Nama'];
                                                                                                                    } elseif (isset($_GET['edit'])) {
                                                                                                                        echo $edit['Nama'];
                                                                                                                    } ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 control-label">Email</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="Email" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
                                                                                                                        echo $_POST['Email'];
                                                                                                                    } elseif (isset($_GET['edit'])) {
                                                                                                                        echo $edit['Email'];
                                                                                                                    } ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 control-label">Instansi</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="Instansi" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
                                                                                                                            echo $_POST['Instansi'];
                                                                                                                        } elseif (isset($_GET['edit'])) {
                                                                                                                            echo $edit['Instansi'];
                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 control-label">Nomor_Handphone</label>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control" name="Nomor_Handphone" value="<?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
                                                                                                                            echo $_POST['Nomor_Handphone'];
                                                                                                                        } elseif (isset($_GET['edit'])) {
                                                                                                                            echo $edit['Nomor_Handphone'];
                                                                                                                        } ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 control-label">Pesan</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control" name="Pesan"><?php if ((isset($_POST['submit_simpan'])) or (isset($_POST['submit_update']))) {
                                                                                                        echo $_POST['Pesan'];
                                                                                                    } elseif (isset($_GET['edit'])) {
                                                                                                        echo $edit['Pesan'];
                                                                                                    } ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>

                                    <div class="text-center">
                                        <?php if (isset($_GET["tambah"])) {  ?>
                                            <input type="submit" class="btn btn-primary" name="submit_simpan" value="SIMPAN">
                                        <?php } elseif (isset($_GET["edit"])) { ?>
                                            <input type="submit" class="btn btn-primary" name="submit_update" value="UPDATE">
                                        <?php } ?>
                                        <input type="button" onclick="document.location.href='<?php echo $kehalaman ?>'" class="btn btn-danger" value="BATAL">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (!((isset($_GET["tambah"])) or (isset($_GET["edit"])))) { ?>
                        <div class="box">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <a href="<?php echo $kehalaman ?>&tambah" class="btn btn-primary">Tambah Baru</a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: right;">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Aktif">AKTIF (<?php echo $hitung_Aktif ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terarsip">TERARSIP (<?php echo $hitung_Terarsip ?>)</a></li>
                                            <li class="list-inline-item"> | </li>
                                            <li class="list-inline-item"><a href="<?php echo $kehalaman ?>&filter_status=Terhapus">SAMPAH (<?php echo $hitung_Terhapus ?>)</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="bg-light">
                                                <th style="width:4%;">No</th>
                                                <th style="width:15%;">Nama</th>
                                                <th style="width:16%;">Email</th>
                                                <th style="width:16%;">Nomor Handphone</th>
                                                <th style="width:15%;">Instansi</th>
                                                <th style="width:30%;">Pesan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_GET['filter_status'])) {
                                                $filter_status = $_GET['filter_status'];
                                            } else {
                                                $filter_status = "Aktif";
                                            }

                                            $search_field_where = array("Status");
                                            $search_criteria_where = array("=");
                                            $search_value_where = array("$filter_status");
                                            $search_connector_where = array("");
                                            $nomor = 0;

                                            $result = $a_tambah_baca_update_hapus->baca_data_dengan_filter("tb_kontak", $search_field_where, $search_criteria_where, $search_value_where, $search_connector_where);

                                            if ($result['Status'] == "Sukses") {
                                                $data_hasil = $result['Hasil'];

                                                foreach ($data_hasil as $data) {
                                                    $nomor++; ?>
                                                    <tr>
                                                        <td><?php echo $nomor ?></td>
                                                        <td>
                                                            <a href="<?php echo $kehalaman ?>&edit&id=<?php echo $a_hash->encode($data["Id_Kontak"], $_GET['menu']); ?>">
                                                                <?php echo $data['Nama'] ?>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $data['Email'] ?></td>
                                                        <td><?php echo $data['Nomor_Handphone'] ?></td>
                                                        <td><?php echo $data['Instansi'] ?></td>
                                                        <td><?php echo $data['Pesan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</div>