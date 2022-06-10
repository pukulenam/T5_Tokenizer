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
        $this->connect = new PDO("mysql:host=localhost;dbname=t5tokenizer", "t5tokenizer", "t5tokenizer");

        date_default_timezone_set('Asia/Jakarta');

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

    function eligible($type, $limit, $count)
    {
        if ($type == 1) {
            $r = true;
        } else if ($type == 2) {
            if ($count < $limit) {
                $r = true;
            } else {
                $r = 'Request Limit Exceeded';
            }
        } else {
            $r = 'Something Went Wrong';
        }
        return $r;
    }

    function checkapi($token)
    {
        $this->query = "
				SELECT api_tbl.*
				FROM api_tbl
				WHERE api_token = '" . $token . "'
				";

        $this->execute();

        if ($this->row_count() > 0) {
            $result = $this->statement_result();

            foreach ($result as $r) {
                $sesid = $r['api_sesid'];
                $type = $r['api_type'];
                $limit = $r['api_limit'];
                $count = $r['api_count'];
            }

            $el = $this->eligible($type, $limit, $count);

            if ($el === true) {
                $this->makelog($sesid,'Making a New Request');
                return true;
            } else {
                return $el;
            }
        } else {
            return 'Invalid Token';
        }
    }

    function makelog($sesid,$activity){
		$data = array(
			':user_sesid' => $sesid,
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
}
