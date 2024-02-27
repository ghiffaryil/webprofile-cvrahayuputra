<?php
class a_hitung_saldo extends a_database{
###BACA DATA DENGAN FILTER WHERE
	function hitung_saldo($Nama_Table, $Field_where = array(),$Criteria_where = array(),$Value_where = array(),$connector_where = array()){

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
		$sql = "SELECT SUM(Debit) - SUM(Kredit) AS Saldo FROM $Nama_Table WHERE ";
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
					$hasil = $data['Saldo'];
				}
			}else{
				$result['Status'] = "Tidak Ada Data";
				$hasil = "0";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil = "0";
		}

		$result['Hasil'] = $hasil;
		#RETURN
		return $result;
	}
}
?>