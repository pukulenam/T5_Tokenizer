<?php

setlocale(LC_TIME, 'id_ID.utf8');
class Syst
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

	function statement_result()
	{
		return $this->statement->fetchAll();
	}

	function get_result()
	{
		return $this->connect->query($this->query, PDO::FETCH_ASSOC);
	}

	function ses_init()
	{
		if (isset($_SESSION['sesid'])) {
			return true;
		} else {
			return false;
		}
	}
}
