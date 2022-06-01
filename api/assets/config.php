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
        if ($type == '1') {
            return true;
        } else if ($type == '2') {
            if ($count < $limit) {
                return true;
            } else {
                return 'Request Limit Exceeded';
            }
        } else {
            return 'Something Went Wrong';
        }
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

            if ($el) {
                return true;
            } else {
                return $el;
            }
        } else {
            return 'Invalid Token';
        }
    }
}
