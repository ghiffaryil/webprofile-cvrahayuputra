<?php
#---------------------------------------------
#FUNGSI TAMBAH
#---------------------------------------------
class a_tambah_baca_update_hapus extends a_database{
	###TAMBAH DATA
	function tambah_data($Nama_Table, $Field = array(),$Value = array(), $strip_tags = "Tidak"){

		#INPUTAN
		$isi_field = "";
		$sql_isi_field = "";
		$isi_value = "";
		$sql_isi_value = "";
		$nomor = 0;
		foreach ($Field as $Fieldloop) {
			$isi_field = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Field[$nomor])));
			$sql_isi_field = $sql_isi_field."".$isi_field."".",";
			$nomor++;
		}
		$sql_isi_field = substr($sql_isi_field, 0, -1);

		$nomor = 0;
		foreach ($Value as $Valueloop) {
			if($strip_tags == "Iya"){
				$isi_value = mysqli_real_escape_string($this->koneksi,(trim($Value[$nomor])));
			}else{
				$isi_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Value[$nomor])));
			}
			$sql_isi_value = $sql_isi_value."'".$isi_value."'".",";
			$nomor++;
		}
		$sql_isi_value = substr($sql_isi_value, 0, -1);

		#SQL UNTUK MENDAPATKAN NOMOR AUTO INCREMENT YANG AKAN DI PAKAI
		$sql = "SHOW TABLE STATUS FROM $this->s_nama_database WHERE name LIKE '$Nama_Table'";
		$query = $this->koneksi->query($sql);
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$hasil = mysqli_fetch_assoc($query);
				$Nomor_Auto_Increment = $hasil['Auto_increment'];
			}else{
				$Nomor_Auto_Increment = "1";
			}
		}else{
			$Nomor_Auto_Increment = "1";
		}


		#FIELD PRIMARY
		// $Field_Id_Primary = $Field[0];
		

		#SQL
		$sql = "INSERT INTO $Nama_Table (";
		$sql = $sql.$sql_isi_field;
		$sql = $sql.") VALUES (";
		$sql = $sql.$sql_isi_value;
		$sql = $sql.")";

		// echo $sql;
		// exit();


		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";
			$result['Id'] = $Nomor_Auto_Increment;

		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI BACA
#---------------------------------------------
	###BACA DATA BERDASARKAN ID
	function baca_data_id($Nama_Table, $Id_Primary_Key, $Id){

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,(trim($Id)));
		
		#SQL
		$sql = "SELECT * FROM $Nama_Table WHERE $Id_Primary_Key = '$Id'";

		// echo $sql;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				$hasil = mysqli_fetch_assoc($query);
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil = mysqli_fetch_assoc($query);
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}

	###BACA DATA ID PERTAMA
	function baca_data_terlama($Nama_Table,$Primary_Key){
		
		#SQL
		$sql = "SELECT $Primary_Key FROM $Nama_Table ORDER BY $Primary_Key ASC LIMIT 1";

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}

	###BACA DATA ID TERAKHIR
	function baca_data_terbaru($Nama_Table,$Primary_Key){
		
		#SQL
		$sql = "SELECT $Primary_Key FROM $Nama_Table ORDER BY $Primary_Key DESC LIMIT 1";
		// echo $sql;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();

		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}


	###BACA DATA DENGAN FILTER WHERE
	function baca_data_dengan_filter($Nama_Table, $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($Field_where as $Field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($Field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($Criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($Value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		#SQL
		$sql = "SELECT * FROM $Nama_Table WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}

	###BACA DATA DENGAN FILTER WHERE
	function baca_data_dengan_select_table_lain_lalu_filter($Nama_Table, $Select_Table_Lainnya = "", $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($Field_where as $Field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($Field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($Criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($Value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		if($Select_Table_Lainnya <> ""){
			$Select_Table_Lainnya = ", ".$Select_Table_Lainnya;
		}

		#SQL
		$sql = "SELECT * $Select_Table_Lainnya FROM $Nama_Table WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}



	###MENGGABUKAN DENGAN LEFT JOIN LALU BACA DATA DENGAN FILTER WHERE
	function baca_data_left_join_dengan_filter($Nama_Table_Utama, $Nama_Table_Lainnya = array(), $Field_Penghubung = array(), $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($Field_where as $Field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($Field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($Criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($Value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		$table_left_join = "";
		$nomor = 0;
		foreach ($Nama_Table_Lainnya as $Table_Lainnya) {
			$table_left_join = $table_left_join." LEFT JOIN ".$Table_Lainnya." ON ".$Nama_Table_Utama.".".$Field_Penghubung[$nomor]." = ".$Table_Lainnya.".".$Field_Penghubung[$nomor];
		}

		#SQL
		$sql = "SELECT * FROM $Nama_Table_Utama $table_left_join WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";

				while($data = mysqli_fetch_assoc($query)){
					$hasil[] = $data;
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI UPDATE
#---------------------------------------------
	###UPDATE DATA
	function update_data($Nama_Table, $Field = array(),$Value = array(),$Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array(), $strip_tags = "Tidak"){

		#INPUTAN
		$isi_field = "";
		$isi_value = "";
		$sql_isi_field_dan_value = "";
		$nomor = 0;
		foreach ($Field as $Fieldloop) {
			$isi_field = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Field[$nomor])));
			if($strip_tags == "Iya"){
				$isi_value = mysqli_real_escape_string($this->koneksi,(trim($Value[$nomor])));
			}else{
				$isi_value = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Value[$nomor])));
			}
			$sql_isi_field_dan_value = $sql_isi_field_dan_value."".$isi_field.""." = "."'".$isi_value."'".",";
			$nomor++;
		}
		$sql_isi_field_dan_value = substr($sql_isi_field_dan_value, 0, -1);


		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($Field_where as $Field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($Field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($Criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($Value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}


		#SQL
		$sql = "UPDATE $Nama_Table SET ";
		$sql = $sql.$sql_isi_field_dan_value;
		$sql = $sql." WHERE ";
		$sql = $sql.$wherenya;


		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI HAPUS DAN ARSIP
#---------------------------------------------
	###DATA MENJADI TERHAPUS/SAMPAH (TRASH)
	function hapus_data_ke_tong_sampah($Nama_Table, $Id_Primary_Key, $Id){

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		#SQL
		$sql = "UPDATE $Nama_Table SET Status = 'Terhapus'
		WHERE 
		$Id_Primary_Key = '$Id'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI TERARSIP (ARSIP/DISEMBUNYIKAN)
	function arsip_data($Nama_Table, $Id_Primary_Key, $Id){

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		#SQL
		$sql = "UPDATE $Nama_Table SET Status = 'Terarsip'
		WHERE 
		$Id_Primary_Key = '$Id'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI TIDAK TERARSIP/AKTIF KEMBALI (RESTORE DARI ARSIP KE AKTIF)
	function restore_data_dari_arsip($Nama_Table, $Id_Primary_Key, $Id){

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		#SQL
		$sql = "UPDATE $Nama_Table SET Status = 'Aktif'
		WHERE 
		$Id_Primary_Key = '$Id'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI RESTORE/AKTIF KEMBALI (RESTORE DARI SAMPAH KE AKTIF)
	function restore_data_dari_tong_sampah($Nama_Table, $Id_Primary_Key, $Id){

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		#SQL
		$sql = "UPDATE $Nama_Table SET Status = 'Aktif'
		WHERE 
		$Id_Primary_Key = '$Id'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}

	###DATA MENJADI HAPUS PERMANEN
	function hapus_data_permanen($Nama_Table, $Id_Primary_Key, $Id){

		// #INPUTAN
		// $Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		// #SQL
		// $sql = "DELETE FROM $Nama_Table
		// WHERE 
		// $Id_Primary_Key = '$Id'
		// ";

		// #FUNGSI
		// $query = $this->koneksi->query($sql);

		// #HASIL
		// if($query){
		// 	$result['Status'] = "Sukses";				
		// }else{
		// 	$result['Status'] = "Gagal";
		// }

		// #RETURN
		// return $result;

		#INPUTAN
		$Id = mysqli_real_escape_string($this->koneksi,strip_tags(trim($Id)));
		

		#SQL
		$sql = "UPDATE $Nama_Table SET Status = 'Terhapus Permanen'
		WHERE 
		$Id_Primary_Key = '$Id'
		";

		#FUNGSI
		$query = $this->koneksi->query($sql);

		#HASIL
		if($query){
			$result['Status'] = "Sukses";				
		}else{
			$result['Status'] = "Gagal";
		}

		#RETURN
		return $result;
	}


#---------------------------------------------
#FUNGSI HITUNG DATA
#---------------------------------------------
	###HITUNG DATA DENGAN FILTER WHERE
	function hitung_data_dengan_filter($Nama_Table, $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";
		$wherenya = "";
		$nomor = 0;
		foreach ($Field_where as $Field_whereloop) {
			$isi_field_where = mysqli_real_escape_string($this->koneksi,(trim($Field_where[$nomor])));
			$isi_criteria_where = mysqli_real_escape_string($this->koneksi,(trim($Criteria_where[$nomor])));
			$isi_value_where = mysqli_real_escape_string($this->koneksi,(trim($Value_where[$nomor])));
			$isi_connector_where = mysqli_real_escape_string($this->koneksi,(trim($connector_where[$nomor])));


			$wherenya = $wherenya." ".$isi_field_where." ".$isi_criteria_where." '".$isi_value_where."' ".$isi_connector_where."";
			$nomor++;
		}

		#SQL
		$sql = "SELECT * FROM $Nama_Table WHERE ";
		$sql = $sql.$wherenya;

		#FUNGSI
		$query = $this->koneksi->query($sql);
		$hasil = array();


		#HASIL
		if($query){
			$hitung = mysqli_num_rows($query);
			if($hitung > 0){
				$result['Status'] = "Sukses";
				$jumlah = mysqli_num_rows($query);
			}else{
				$result['Status'] = "Tidak Ada Data";
				$jumlah = "0";
			}
		}else{
			$result['Status'] = "Gagal";
			$jumlah = "0";
		}

		$result['Hasil'] = $jumlah;
		#RETURN
		return $result;
	}

}
?>