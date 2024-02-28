<?php 
class a_hash_password {
	public function hash_password($string, $string_tambahan = "_indonesia"){
		$hash_password = md5(md5(md5(md5(md5($string."$string_tambahan")))));
		return $hash_password;
	}
}
?>