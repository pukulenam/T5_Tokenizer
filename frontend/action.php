<?php

include('assets/php/config.php');

$object = new Syst;

if (isset($_POST["action"])) {

	$alert = '';
	$error = '';
	$success = '';

	if ($_POST["action"] == 'sessioncheck') {

		$resp = '';

		if (!isset($_COOKIE['sesid'])) {

			$object->destroy_ses();

			$newsesid = $object->newuser();
			setcookie('sesid', $newsesid, time() + (86400 * 30), "/");
			$_SESSION['sesid'] = $newsesid;

			$token = md5($newsesid.$_SERVER['HTTP_USER_AGENT'].$object->client_ip()); //Not yet utilized
			setcookie('token', $token, time() + (86400 * 30), "/");

			$alert = 'alert alert-success';
			$success = 'Halo Selamat Datang di T5Tokenizer News Summarization';
		} else {

			$sesid = $_COOKIE['sesid'];

			$object->query = "
				SELECT user_tbl.user_sesid
				FROM user_tbl
				WHERE user_sesid = '" . $sesid . "'
				";

			$object->execute();

			if ($object->row_count() > 0) {

				if ($object->ses_init()) {

					$alert = 'alert alert-success';
					$success = 'Halo Anda Masih Disini';
				} else {

					$_SESSION['sesid'] = $sesid;

					$object->query = "
					UPDATE user_tbl 
					SET user_lastlogin = NOW() 
					WHERE user_sesid = '" . $sesid . "'
					";

					$object->execute();

					$data = array(
						':user_sesid' => $sesid,
						':user_ip' => $object->client_ip(),
						':user_agent' => $_SERVER['HTTP_USER_AGENT'],
						':user_activity' => 'ReLogin'
					);

					$object->query = "
					INSERT INTO log_tbl 
					(user_sesid, user_ip, user_agent, user_activity) 
					VALUES 
					(:user_sesid, :user_ip, :user_agent, :user_activity)
					";

					$object->execute($data);

					$alert = 'alert alert-success';
					$success = 'Halo Selamat Datang Kembali';
				}

			} else {

				$object->destroy_ses();

				$newsesid = $object->newuser();
				$_SESSION['sesid'] = $newsesid;
				setcookie('sesid', $newsesid, time() + (86400 * 30), "/");

				$alert = 'alert alert-success';
				$success = 'Halo Selamat Datang di T5Tokenizer News Summarization';
			}
		}

		$output = array(
			'alert'		=>  $alert,
			'error'		=>	$error,
			'success'	=>	$success
		);

	}elseif ($_POST["action"] == 'newrequest') {

		if (!isset($_POST["cbx"])){
			$cbx = 0;
		}else{
			$cbx = $_POST["cbx"];
		}
		if (!isset($_POST["cby"])){
			$cby = 0;
		}else{
			$cby = $_POST["cby"];
		}
		if (!isset($_POST["cbyn"])){
			$cbyn = 0;
		}else{
			$cbyn = $_POST["cbyn"];
		}

		$data = array(
			':var1' => $_POST["varone"],
			':var2' => $_POST["vartwo"],
			':var3' => $_POST["varthree"],
			':cbx' => $cbx,
			':cby' => $cby,
			':cbyn' => $cbyn,
			':news' => $object->clean_input($_POST["lt"])
		);

		 ​$​data​1 = ​array​( 
 ​                        ​$​_POST​[​"varone"​], 
 ​                        ​$​_POST​[​"vartwo"​], 
 ​                        ​$​_POST​[​"varthree"​], 
 ​                        ​$​cbx​, 
 ​                        ​$​cby​, 
 ​                        ​$​cbyn​, 
 ​                        ​$​object​->​clean_input​(​$​_POST​[​"lt"​]) 
 ​                );


		$pydata = json_encode($data1);
		$command = escapeshellcmd('python test.py "' . $pydata . '"');

		$gen_req_uniqid = strtoupper(substr(md5(uniqid()), 0, 8));

		$object->query = "
			INSERT INTO req_tbl 
			(req_sesid, req_uniqid, req_var1, req_var2, req_var3, req_cb1, req_cb2, req_cb3, req_news) 
			VALUES 
			('".$_SESSION['sesid']."', '".$gen_req_uniqid."', :var1, :var2, :var3, :cbx, :cby, :cbyn, :news)
			";

		$object->execute($data);

		$sum = shell_exec($command);

		sleep(1);

		$object->query = "
					UPDATE req_tbl 
					SET req_sum = '".$sum."' 
					WHERE req_uniqid = '" . $gen_req_uniqid . "'
					";

		$object->execute();

		$alert = 'alert alert-success';
		$success = 'Summary OK';
		$output = array(
			'sumtext'		=>  $sum,
			'alert'		=>  $alert,
			'error'		=>	$error,
			'success'	=>	$success
		);
	}
	echo json_encode($output);
}
