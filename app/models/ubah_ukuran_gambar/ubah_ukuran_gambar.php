<?php 
class a_ubah_ukuran_gambar {
	function compress($asal_file, $nama_file, $folder_penyimpanan, $quality) {
	    $info = getimagesize($source);
	 
	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($source);
	 
	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($source);
	 
	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($source);
	    imagescale($image,1920);
	    imagejpeg($image, $destination, $quality);
	 
	    return $destination;
	}
}
?>