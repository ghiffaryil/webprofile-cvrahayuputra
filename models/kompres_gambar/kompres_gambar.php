<?php 
class a_kompres_gambar {
	function kompres_gambar($asal_file, $nama_file, $folder_penyimpanan, $kualitas){
		$array_keterangan_error = array();
		$info_file = getimagesize($asal_file);
		$status_error = 1;
		if ($info_file['mime'] == 'image/jpeg'){
			$gambar = imagecreatefromjpeg($asal_file);
			imagejpeg($gambar, $folder_penyimpanan . $nama_file, $kualitas);
				$status_error = 0;
				$result['Status'] = "Sukses";
		}elseif ($info_file['mime'] == 'image/gif'){
			$gambar = imagecreatefromgif($asal_file);
			imagegif($gambar, $folder_penyimpanan . $nama_file);
				$status_error = 0;
				$result['Status'] = "Sukses";
		}elseif ($info_file['mime'] == 'image/png'){
			$gambar = imagecreatefrompng($asal_file);
			imagepng($gambar, $folder_penyimpanan . $nama_file, $kualitas);
				$status_error = 0;
				$result['Status'] = "Sukses";
		}else{
			$result['Status'] = "Gagal";
			if(!empty($array_keterangan_error)){
				$result['Keterangan_Error'] = $array_keterangan_error;
			}
		}

		return $result;

	}
}
?>