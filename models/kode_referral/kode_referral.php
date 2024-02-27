<?php 
class a_kode_referral {
	public function generate_kode_referral($string_ymdHis){
		$jumlah_string = strlen($string_ymdHis);

		$text_untuk_diacak = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

		$tahun = substr($string_ymdHis, 0,2);
		$bulan = substr($string_ymdHis, 2,2);
		$tanggal = substr($string_ymdHis, 4,2);
		$jam = substr($string_ymdHis, 6,2);
		$menit = substr($string_ymdHis, 8,2);
		$detik = substr($string_ymdHis, 10,2);

		$text_acak_1 = substr($text_untuk_diacak, rand(0,60),1);

		$text_acak_2 = substr($text_untuk_diacak, $tahun,1);
		$text_acak_3 = substr($text_untuk_diacak, $bulan,1);
		$text_acak_4 = substr($text_untuk_diacak, $tanggal,1);
		$text_acak_5 = substr($text_untuk_diacak, $jam,1);
		$text_acak_6 = substr($text_untuk_diacak, $menit,1);
		$text_acak_7 = substr($text_untuk_diacak, $detik,1);

		$kode_referral = $text_acak_1.$text_acak_2.$text_acak_3.$text_acak_4.$text_acak_5.$text_acak_6.$text_acak_7;

		return $kode_referral;
	}
}
?>