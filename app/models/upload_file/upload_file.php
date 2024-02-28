<?php

class a_upload_file {
	public function upload_file($post_file, $nama_file, $folder_penyimpanan, $format_file = array() ,$maksimum_ukuran_file = 100000000){
		$array_keterangan_error = array();
		$folder_penyimpanan = $folder_penyimpanan;
		$tipe_file = strtolower(pathinfo($folder_penyimpanan . basename($post_file["name"]),PATHINFO_EXTENSION));
		$target_penyimpanan_file = $folder_penyimpanan . $nama_file.".".$tipe_file;
		$status_upload = 1;
		

		if ($post_file["size"] > $maksimum_ukuran_file) {
			$status_upload = 0;
			$array_keterangan_error[] = "File Melebihi Ukuran Maksimum File Yakni : ".$maksimum_ukuran_file."KB";
		}

		if (!(in_array($tipe_file, $format_file, TRUE))) {
			$status_upload = 0;
			$array_keterangan_error[] = "Format File Tidak di Izinkan";
		}

		if ($status_upload == 0) {
			$result['Status'] = "Gagal";
			if(!empty($array_keterangan_error)){
				$result['Keterangan_Error'] = $array_keterangan_error;
			}
		} else {
			if (move_uploaded_file($post_file["tmp_name"], $target_penyimpanan_file)) {
				$result['Status'] = "Sukses";
			} else {
				$result['Status'] = "Gagal";
				if(!empty($array_keterangan_error)){
					$result['Keterangan_Error'] = $array_keterangan_error;
				}
			}
		}

		return $result;
	}
}
?>
