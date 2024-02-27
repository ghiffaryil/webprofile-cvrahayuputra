<?php 
class a_hash {
	public function encode($string, $string_tambahan){
		$encode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($string."$string_tambahan")))));
		return $encode;
	}	

	public function decode($string, $string_tambahan){
		$decode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));
		$decode = str_replace("$string_tambahan", "", $decode);
		return $decode;
	}



	public function encode_link_kembali($string){
		$encode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($string)))));
		return $encode;
	}	

	public function decode_link_kembali($string){
		$decode = base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($string)))));
		return $decode;
	}


	public function hash_nama_file($string, $string_tambahan = "_indonesia"){
		$hash_nama_file = md5($string."$string_tambahan");
		return $hash_nama_file;
	}
}
?>