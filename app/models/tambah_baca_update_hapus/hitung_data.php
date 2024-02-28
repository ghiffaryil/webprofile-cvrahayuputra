<?php
#---------------------------------------------
#FUNGSI TAMBAH
#---------------------------------------------
class a_hitung_data extends a_database{
	###TAMBAH DATA

	###MENGGABUKAN DENGAN LEFT JOIN LALU BACA DATA DENGAN FILTER WHERE
	function hitung_data_left_join_dengan_filter($Nama_Table_Utama, $Nama_Table_Lainnya = array(), $Field_Penghubung = array(), $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

		#INPUTAN
		$isi_field_where = "";
		$isi_criteria_where = "";
		$isi_value_where = "";
		$isi_connector_where = "";

		$table_left_join = "";
		$nomor = 0;

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

		$nomor = 0;
		foreach ($Nama_Table_Lainnya as $Table_Lainnya) {
			$nomor_plus = $nomor++;
			$table_left_join = $table_left_join." LEFT JOIN ".$Table_Lainnya." ON ".$Nama_Table_Utama.".".$Field_Penghubung[$nomor_plus]." = ".$Table_Lainnya.".".$Field_Penghubung[$nomor];
		}

		#SQL
		$sql = "SELECT * FROM $Nama_Table_Utama $table_left_join WHERE ";
		$sql = $sql.$wherenya;

		// echo $sql;;

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

	function lihat_data_terbanyak($Nama_Table,$Nama_Field,$Field_Hasil,$Limit){
		#SQL
		$sql = "SELECT $Nama_Field, COUNT($Nama_Field) AS $Field_Hasil FROM $Nama_Table GROUP BY $Nama_Field ORDER BY $Field_Hasil DESC LIMIT $Limit";
		// echo $sql;;

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

	function lihat_data_terbanyak_dengan_filter($Nama_Table,$Nama_Field,$Field_Hasil,$Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array(),$Limit){

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
		$sql = "SELECT $Nama_Field, COUNT($Nama_Field) AS $Field_Hasil FROM $Nama_Table WHERE";
		$sql = $sql.$wherenya;
		$sql = $sql." GROUP BY $Nama_Field ORDER BY $Field_Hasil DESC LIMIT $Limit";

		// echo $sql;;

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

}
?>