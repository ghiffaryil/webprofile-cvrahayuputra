<?php 
class a_database {
	private $host;
	private $user;
	private $pass;
	private $db;
	public $koneksi;

	public function __construct() {
		$this->db_connect();
		$this->s_nama_database = "root";
	}

	public function __destruct() {
		mysqli_close($this->db_connect());
	}

	private function db_connect(){
		$this->host = 'localhost';
		$this->user = 'root';
		$this->pass = '';
		$this->db = 'db_cvrahayuputra';

		$this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);
		return $this->koneksi;
	}
}
?>