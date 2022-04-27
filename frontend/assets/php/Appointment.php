<?php

//Appointment.php
setlocale(LC_TIME, 'id_ID.utf8');
class Appointment
{
	public $base_url = 'http://localhost/t5_tokenizer/frontend/';
	public $connect;
	public $query;
	public $statement;
	public $now;

	public function __construct()
	{
		$this->connect = new PDO("mysql:host=localhost;dbname=t5test", "root", "");

		date_default_timezone_set('Asia/Jakarta');

		session_start();

		$this->now = date("Y-m-d H:i:s",  STRTOTIME(date('h:i:sa')));
	}

	function execute($data = null)
	{
		$this->statement = $this->connect->prepare($this->query);
		if ($data) {
			$this->statement->execute($data);
		} else {
			$this->statement->execute();
		}
	}

	function row_count()
	{
		return $this->statement->rowCount();
	}

	function statement_result()
	{
		return $this->statement->fetchAll();
	}

	function get_result()
	{
		return $this->connect->query($this->query, PDO::FETCH_ASSOC);
	}

	function user_islogin()
	{
		if (isset($_SESSION['user_id'])) {
			return true;
		} else {
			return false;
		}
	}

	function clean_input($string)
	{
		$string = trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return $string;
	}

	function gen_cart_no($scl_trxunum)
	{
		$this->query = "
		SELECT MAX(scl_trxcartno) as scl_trxcartno FROM scale_tbl
		WHERE scl_trxunum = '" . $scl_trxunum . "'
		";

		$result = $this->get_result();

		$scl_trxcartno = 0;

		foreach($result as $row)
		{
			$scl_trxcartno = $row["scl_trxcartno"];
		}

		if($scl_trxcartno > 0)
		{
			return $scl_trxcartno + 1;
		}
		else
		{
			return '1001';
		}
	}

}
