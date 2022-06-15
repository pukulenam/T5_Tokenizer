<?php

setlocale(LC_TIME, 'id_ID.utf8');
class Syst
{
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

	function row_count()
	{
		return $this->statement->rowCount();
	}

	function clean_input($string)
	{
		$string = trim($string);
		$string = stripslashes($string);
		$string = htmlspecialchars($string);
		return $string;
	}

	function ses_init()
	{
		if (isset($_SESSION['sesid'])) {
			return true;
		} else {
			return false;
		}
	}

	function destroy_ses(){
		if (isset($_SESSION['sesid'])) {
			session_destroy();
		}
	}

	function client_ip()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		//whether ip is from remote address
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	function makelog($activity){
		$data = array(
			':user_sesid' => $_SESSION['sesid'],
			':user_ip' => $this->client_ip(),
			':user_agent' => $_SERVER['HTTP_USER_AGENT'],
			':user_activity' => $activity
		);

		$this->query = "
		INSERT INTO log_tbl 
		(user_sesid, user_ip, user_agent, user_activity) 
		VALUES 
		(:user_sesid, :user_ip, :user_agent, :user_activity)
		";

		$this->execute($data);
	}

	function newuser(){

			$newsesid = substr(md5(uniqid()), 0, 8);

			$data = array(
				':user_sesid' => $newsesid
			);

			$this->query = "
				INSERT INTO user_tbl 
				(user_sesid,user_lastlogin) 
				VALUES 
				(:user_sesid, NOW())
				";

			$this->execute($data);

			return $newsesid;
	}
}
