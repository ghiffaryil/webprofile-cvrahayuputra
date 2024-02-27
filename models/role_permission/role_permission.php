<?php
#---------------------------------------------
#FUNGSI PERMISSION
#---------------------------------------------
class a_role_permission extends a_database{
#---------------------------------------------
#FUNGSI READ
#---------------------------------------------
	###READ DATA BERDASARKAN ID
	function read_permission($Id_Role,$Nama_Modul){
		if($Id_Role <> "" AND $Nama_Modul <> ""){
		#INPUTAN
			$Id_Role = mysqli_real_escape_string($this->koneksi,(trim($Id_Role)));

		#SQL CEK ADMINISTRATOR
			$sql = "SELECT * FROM tb_data_role WHERE `Id_Role` = '$Id_Role'";

		#FUNGSI
			$query = $this->koneksi->query($sql);
			$hasil = array();

			$cek_administrator = mysqli_fetch_assoc($query);
			if($cek_administrator['Nama_Role'] == "Administrator"){
				$result['Status'] = "Sukses - Administrator";
				$hasil['Akses'] = "Iya";
			}else{
				#SQL
				$sql = "SELECT * FROM tb_data_role_crud WHERE `Id_Role` = '$Id_Role' AND `Nama_Modul` = '$Nama_Modul'";

				#FUNGSI
				$query = $this->koneksi->query($sql);

				#HASIL
				if($query){
					$hitung = mysqli_num_rows($query);
					if($hitung > 0){
						$result['Status'] = "Sukses";

						$hasil = mysqli_fetch_assoc($query);
					}else{
						$result['Status'] = "Tidak Ada Data";
						$hasil['Akses'] = "";
					}
				}else{
					$result['Status'] = "Gagal";
					$hasil['Akses'] = "";
				}
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil['Akses'] = "";
		}

		#RETURN
		return array($result, $hasil);
	}

	###READ DATA BERDASARKAN ID
	function role($Id_Role){

		#INPUTAN
		$Id_Role = mysqli_real_escape_string($this->koneksi,(trim($Id_Role)));
		
		#SQL
		$sql = "SELECT * FROM tb_data_role WHERE `Id_Role` = '$Id_Role'";

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
				$hasil[] = "";
			}
		}else{
			$result['Status'] = "Gagal";
			$hasil[] = "";
		}

		#RETURN
		return array($result, $hasil);
	}
}
?>